<?php
/**
 * OembedClientTest.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\Http;

use PHPUnit\Framework\TestCase;

use Embera\Embera;
use Embera\Provider\Youtube;
use ReflectionClass;

class OembedClientTest extends TestCase
{
    public function testUrlConstructor()
    {
        $httpClientStub = $this->createMock(HttpClient::class);
        $httpClientStub->method('fetch')->willReturn(false);

        $oembed = new OembedClient([
            'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
        ], $httpClientStub);

        $reflection = new ReflectionClass($oembed);
        $method = $reflection->getMethod('constructUrl');
        $method->setAccessible(true);

        $result = $method->invoke($oembed, 'http://host.com/path/', ['value' => '1', 'value2' => '3', 'format' => 'json']);
        $this->assertEquals($result, 'http://host.com/path/?value=1&value2=3&format=json');

        $result = $method->invoke($oembed, 'http://host.com/path', ['value' => '1', 'value2' => '3', 'format' => 'json']);
        $this->assertEquals($result, 'http://host.com/path?value=1&value2=3&format=json');

        $result = $method->invoke($oembed, 'http://host.com/?url=100', ['maxheight' => 400, 'format' => 'json']);
        $this->assertEquals($result, 'http://host.com/?url=100&maxheight=400&format=json');

        $result = $method->invoke($oembed, 'http://host.com/', []);
        $this->assertEquals($result, 'http://host.com/?');
    }

    public function testFallbackFakeResponse()
    {
        $testUrl = 'https://www.youtube.com/watch?v=YbJOTdZBX1g';

        $httpClientStub = $this->createMock(HttpClient::class);
        $httpClientStub->method('fetch')->willReturn(false);

        $oembedClient = new OembedClient([
            'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
            'maxwidth' => 430,
            'maxheight' => 270,
        ], $httpClientStub);

        $result = $oembedClient->getResponseFrom(new Youtube($testUrl, [
            'maxwidth' => 430,
            'maxheight' => 270,
        ]));

        $this->assertTrue((bool) $result['embera_using_fake_response']);
        $this->assertEquals('1.0', $result['version']);
    }

    public function testEmptyUrlResponse()
    {
        $testUrl = 'https://www.youtube.com/watch?v=YbJOTdZBX1g';

        $httpClientStub = $this->createMock(HttpClient::class);
        $httpClientStub->method('fetch')->willReturn(false);

        $oembedClient = new OembedClient([
            'fake_responses' => Embera::DISABLE_FAKE_RESPONSES,
            'maxwidth' => 430,
            'maxheight' => 270,
        ], $httpClientStub);

        $result = $oembedClient->getResponseFrom(new Youtube($testUrl, [
            'maxwidth' => 430,
            'maxheight' => 270,
        ]));

        $this->assertEquals([], $result);
    }
}
