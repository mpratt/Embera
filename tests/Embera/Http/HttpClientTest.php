<?php
/**
 * HttpClientTest.php
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

class HttpClientTest extends TestCase
{
    protected function fetchData($useCurl = true)
    {
        $ua = 'PHP/Embera Test - ' . date('Y-m-d');
        $http = new HttpClient([
            'use_curl' => (bool) $useCurl,
            'user_agent' => $ua,
        ]);

        if (!$useCurl && !ini_get('allow_url_fopen')) {
            $this->markTestIncomplete('Could not test file_get_contents wrapper, allow_url_fopen is closed');
            return ;
        }

        $response = $http->fetch('https://httpbin.org/user-agent');
        $response = json_decode($response, true);
        $this->assertEquals($ua, $response['user-agent']);

        $response = $http->fetch('https://httpbin.org/relative-redirect/2');
        $response = json_decode($response, true);
        $this->assertEquals('https://httpbin.org/get', $response['url']);

        $response = $http->fetch('https://httpbin.org/redirect-to?url=' . urlencode('https://httpbin.org/user-agent'));
        $response = json_decode($response, true);
        $this->assertEquals($ua, $response['user-agent']);

        $response = $http->fetch('https://httpbin.org/redirect-to?url=' . urlencode('https://httpbin.org/user-agent'));
        $response = json_decode($response, true);
        $this->assertEquals($ua, $response['user-agent']);


    }

    /** @large */
    public function testCanFetchUrlDataWithCurl()
    {
        $this->fetchData();
    }

    /** @large */
    public function testCanFetchUrlDataWithfopen()
    {
        $this->fetchData(false);
    }

    public function testCanDetectInvalidUrl()
    {
        $this->expectException('InvalidArgumentException');

        $http = new HttpClient();
        $http->fetch('this is an invalid url');
    }

    public function testCurlCanDetectInvalidStatusCode()
    {
        $this->expectException('Exception');

        $ua = 'PHP/Embera Test - ' . date('Y-m-d');
        $http = new HttpClient([
            'use_curl' => true,
            'user_agent' => $ua,
        ]);

        $response = $http->fetch('https://httpbin.org/status/404');
    }
}
