<?php
/**
 * HttpClientCacheTest.php
 *
 * @package Tests
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\Http;

use PHPUnit\Framework\TestCase;
use Embera\Cache\Filesystem;

class HttpClientCacheTest extends TestCase
{
    public function testHttpRequestHit()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $cache->clear();

        $params = [];
        $url = 'https://httpbin.org/user-agent';
        $ua = 'PHP/Embera Test - ' . date('Y-m-d');
        $key = md5(serialize([ 'url' => $url, 'params' => $params ]));

        $httpCache = new HttpClientCache(new HttpClient());
        $httpCache->setconfig([
            'use_curl' => true,
            'user_agent' => $ua,
        ]);

        $httpCache->setCachingEngine($cache);

        $response = $httpCache->fetch($url);
        $responseJson = json_decode($response, true);
        $this->assertEquals($ua, $responseJson['user-agent']);

        $this->assertTrue($cache->has($key));
        $this->assertEquals($cache->get($key), $response);

        // Use Cache
        $response = $httpCache->fetch($url);
        $this->assertTrue($cache->has($key));
        $this->assertEquals($cache->get($key), $response);
        $this->assertTrue($cache->delete($key));
    }

    public function testHttpRequestFailed()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $cache->clear();

        $httpClientStub = $this->createMock(HttpClient::class);
        $httpClientStub->method('fetch')->willReturn(false);

        $httpCache = new HttpClientCache($httpClientStub);
        $httpCache->setCachingEngine($cache);

        $response = $httpCache->fetch('http://host.com/test');
        $this->assertFalse($response);
    }

}
