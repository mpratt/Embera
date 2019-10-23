<?php
/**
 * HttpClient.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Http;

use Exception;
use InvalidArgumentException;

/**
 * This class is in charge of doing http requests. Its a very minimal
 * wrapper for curl or file_get_contents
 */
class HttpClient
{
    /** @var array Array with custom curl/fopen options */
    protected $config = [];

    /** @var string User Agent String */
    protected $userAgent = 'Mozilla/5.0 PHP/Embera';

    /**
     * Constructor
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge([], $config);
    }

    /**
     * Executes http requests
     *
     * @param string $url
     * @param array $params Additional parameters for the respective part
     * @return string
     *
     * @throws Exception when an error ocurred or if no way to do a request exists
     */
    public function fetch($url, array $params = [])
    {
        if (!filter_var($url, \FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(sprintf('Invalid url %s', $url));
        }

        if (function_exists('curl_init')) {
            return $this->curl($url, $params['curl']);
        }

        if (ini_get('allow_url_fopen')) {
            return $this->fileGetContents($url, $params['fopen']);
        }

        throw new Exception('Could not execute http request. No Curl found and allow_url_fopen is disabled.');
    }

    /**
     * Uses Curl to fetch data from an url
     *
     * @param string $url
     * @param array $params Additional parameters for the respective part
     * @return string
     *
     * @throws Exception when the returned status code is not 200 or no data was found
     */
    protected function curl($url, array $params = [])
    {
        // Not using array_merge here because that function reindexes numeric keys
        $options = $params + array(
            CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_ENCODING => '',
            CURLOPT_FOLLOWLOCATION => true,
        );

        $options[CURLOPT_URL] = $url;
        $options[CURLOPT_HEADER] = true;
        $options[CURLOPT_RETURNTRANSFER] = 1;

        $handler = curl_init();
        curl_setopt_array($handler, $options);
        $response = curl_exec($handler);

        $status = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($handler, CURLINFO_HEADER_SIZE);

        $header = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
        curl_close($handler);


        if (empty($body) || !in_array($status, array('200'))) {
            throw new Exception($status . ': Invalid response for ' . $url);
        }

        return $body;
    }

    /**
     * Uses file_get_contents to fetch data from an url
     *
     * @param string $url
     * @param array $params Additional parameters for the respective part
     * @return string
     *
     * @throws Exception when allow_url_fopen is disabled or when no data was returned
     */
    protected function fileGetContents($url, array $params = [])
    {
        $params = array_merge([
            'method' => 'GET',
            'user_agent' => $this->userAgent,
            'follow_location' => 1,
            'max_redirects' => 20,
            'timeout' => 40
        ], $params);

        $context = array('http' => $params);
        if ($data = file_get_contents($url, false, stream_context_create($context))) {
            return $data;
        }

        throw new Exception('Invalid Server Response from ' . $url);
    }
}
