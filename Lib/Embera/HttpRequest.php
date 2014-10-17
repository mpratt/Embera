<?php
/**
 * HttpRequest.php
 *
 * @package Embera
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

/**
 * This class is in charge of doing http requests. Its a very minimal
 * wrapper for curl or file_get_contents
 */
class HttpRequest
{
    /** @var array Array with custom curl/fopen options */
    protected $config = array();

    /** @var string User Agent String */
    protected $userAgent = 'Mozilla/5.0 PHP/Embera';

    /**
     * Constructor
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config = array())
    {
        $this->config = array_merge(array(
            'curl' => array(),
            'fopen' => array(),
            'force_redirects' => false,
            'prefer_curl' => true,
        ), $config);
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
    public function fetch($url, array $params = array())
    {
        $params = array_merge(array(
            'curl' => array(),
            'fopen' => array(),
        ), $params);

        if (function_exists('curl_init') && $this->config['prefer_curl']) {
            return $this->curl($url, $params['curl']);
        }

        return $this->fileGetContents($url, $params['fopen']);
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
    protected function curl($url, array $params = array())
    {
        // Not using array_merge here because that function reindexes numeric keys
        $options = $params + $this->config['curl'] + array(
            CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_ENCODING => '',
            CURLOPT_FOLLOWLOCATION => true,
        );

        $options[CURLOPT_URL] = $url;
        $options[CURLOPT_HEADER] = true;
        $options[CURLOPT_RETURNTRANSFER] = 1;

         // CURLOPT_FOLLOWLOCATION doesnt play well with open_basedir/safe_mode
        if (ini_get('safe_mode') || ini_get('open_basedir')) {
            $options[CURLOPT_FOLLOWLOCATION] = false;
            $options[CURLOPT_TIMEOUT] = 15;
            $this->config['force_redirects'] = true;
        }

        $handler = curl_init();
        curl_setopt_array($handler, $options);
        $response = curl_exec($handler);

        $status = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($handler, CURLINFO_HEADER_SIZE);

        $header = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
        curl_close($handler);

        if ($this->config['force_redirects'] && in_array($status, array('301', '302'))) {

            if (preg_match('~(?:location|uri): ?([^\n]+)~i', $header, $matches)) {

                $url = trim($matches['1']);

                // Relative redirections
                if (substr($url, 0, 1) == '/') {
                    $parsed = parse_url($options[CURLOPT_URL]);
                    $url = $parsed['scheme'] . '://' . rtrim($parsed['host'], '/') . $url;
                }

                return $this->curl($url, $options);
            }
        }

        if (empty($body) || !in_array($status, array('200'))) {
            throw new \Exception($status . ': Invalid response for ' . $url);
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
    protected function fileGetContents($url, array $params = array())
    {
        if (!ini_get('allow_url_fopen')) {
            throw new \Exception('Could not execute lookup, allow_url_fopen is disabled');
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception('Invalid url ' . $url);
        }

        $defaultOptions = array(
            'method' => 'GET',
            'user_agent' => $this->userAgent,
            'follow_location' => 1,
            'max_redirects' => 20,
            'timeout' => 40
        );

        $context = array('http' => array_merge($defaultOptions, $this->config['fopen'], $params));
        if ($data = file_get_contents($url, false, stream_context_create($context))) {
            return $data;
        }

        throw new \Exception('Invalid Server Response from ' . $url);
    }
}

?>
