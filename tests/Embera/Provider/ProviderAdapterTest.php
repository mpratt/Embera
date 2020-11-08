<?php
/**
 * ProviderAdapterTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use PHPUnit\Framework\TestCase;
use Embera\Embera;

/**
 * Test the ProviderAdapter by using the Youtube Provider
 */
final class ProviderAdapterTest extends TestCase
{
    public function testCustomParams()
    {
        $testUrl = 'https://www.youtube.com/watch?v=YbJOTdZBX1g';
        $config = [
            'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
            'youtube_maxwidth' => 500,
            'maxwidth' => 430,
            'maxheight' => 270,
        ];

        $provider = new Youtube($testUrl, $config);
        $params = $provider->getParams();

        $this->assertEquals($params['url'], $testUrl);
        $this->assertEquals($params['maxwidth'], $config['youtube_maxwidth']);
        $this->assertEquals($params['maxheight'], $config['maxheight']);
        $this->assertArrayNotHasKey('fake_responses', $params);
    }

    public function testGetProviderHosts()
    {
        $hosts = Youtube::getHosts();
        foreach ($hosts as $h) {
            $this->assertStringContainsStringIgnoringCase('youtu', $h);
        }

        Youtube::addHost('myhost.com');
        $hosts = Youtube::getHosts();
        $this->assertTrue((count($hosts) > 1), 'Error registering new host to provider');
        $this->assertContains('myhost.com', $hosts, 'Could not find newly registered host in provider');
    }
}
