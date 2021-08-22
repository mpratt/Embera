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
class HttpClient implements HttpClientInterface
{
    /** @var array Array with custom curl/fopen options */
    protected $config = [];

    /**
     * Alias for the setConfig method
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->setConfig($config);
    }

    /** inline {@inheritdoc} */
    public function setConfig(array $config = [])
    {
        $this->config = array_merge([
            'use_curl' => true,
            'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36',
            'referer' => '',
            'curl_params' => [],
            'file_get_contents_params' => []
        ], $config);
    }

    /** inline {@inheritdoc} */
    public function fetch($url, array $params = [])
    {
        if (!filter_var($url, \FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(sprintf('Invalid url %s', $url));
        }

        if (function_exists('curl_init') && $this->config['use_curl']) {
            return $this->fetchWithCurl($url, $this->config['curl_params']);
        }

        return $this->fetchWithFileGetContents($url, $this->config['file_get_contents_params']);
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
    protected function fetchWithCurl($url, array $params = [])
    {
        // Not using array_merge here because that function reindexes numeric keys
        $options = $params + array(
            CURLOPT_USERAGENT => $this->config['user_agent'],
            CURLOPT_ENCODING => '',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLINFO_HEADER_OUT => true,
        );

        if (!empty($this->config['referer'])) {
            $options[CURLOPT_REFERER] = $this->config['referer'];
        }

        $options[CURLOPT_URL] = $url;
        $options[CURLOPT_HEADER] = true;
        $options[CURLOPT_RETURNTRANSFER] = 1;

        $handler = curl_init();
        curl_setopt_array($handler, $options);

        $response = curl_exec($handler);

        $status = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($handler, CURLINFO_HEADER_SIZE);
        //$headerOut = curl_getinfo($handler, CURLINFO_HEADER_OUT);

        $body = substr($response, $headerSize);
        curl_close($handler);

        if (empty($body) || $status != '200') {
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
    protected function fetchWithFileGetContents($url, array $params = [])
    {
        if (!ini_get('allow_url_fopen')) {
            throw new Exception('Could not execute http request - allow_url_fopen is disabled.');
        }

        $params = array_merge([
            'method' => 'GET',
            'user_agent' => $this->config['user_agent'],
            'follow_location' => 1,
            'max_redirects' => 20,
            'timeout' => 40
        ], $params);

        if (!empty($this->config['referer'])) {
            $referer = 'Referer: ' . $this->config['referer'] . "\r\n";
            if (!empty($params['header'])) {
                $params['header'] = [ $referer ];
            } else {
                $params['header'][] = $referer;
            }
        }

        $context = array('http' => $params);
        if ($data = file_get_contents($url, false, stream_context_create($context))) {
            return $data;
        }

        throw new Exception('Invalid Server Response from ' . $url);
    }

}
