<?php
/**
 * HttpRequest.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

class HttpRequest
{
    /**
     * Executes http requests
     *
     * @param string $url
     * @return string
     *
     * @throws Exception when an error ocurred or if no way to do a request exists
     */
    public function fetch($url = '')
    {
        if (function_exists('curl_init'))
            return $this->curl($url);

        return $this->fileGetContents($url);
    }

    /**
     * Uses Curl to fetch data from an url
     *
     * @param string $url
     * @return string
     *
     * @throws Exception when the returned status code is not 200 or no data was found
     */
    protected function curl($url)
    {
        $options = array(CURLOPT_URL => $url,
                         CURLOPT_FOLLOWLOCATION => true,
                         //CURLOPT_CONNECTTIMEOUT => 10,
                         CURLOPT_ENCODING => 'UTF-8',
                         CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:2.0.1) Gecko/20110606 Firefox/4.0.1',
                         CURLOPT_HEADER => false,
                         CURLOPT_RETURNTRANSFER => 1);

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $data = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (empty($data) || !in_array($status, array('200')))
            throw new \Exception($status . ': Invalid response for ' . $url);

        return $data;
    }

    /**
     * Uses file_get_contents to fetch data from an url
     *
     * @param string $url
     * @return string
     *
     * @throws Exception when allow_url_fopen is disabled or when no data was returned
     */
    protected function fileGetContents($url)
    {
        if (!ini_get('allow_url_fopen'))
            throw new \Exception('Could not execute lookup, allow_url_fopen is disabled');

        if ($data = file_get_contents($url, false, stream_context_create(array('http' => array('method' => 'GET')))))
            return $data;

        throw new \Exception('Invalid Server Response from ' . $url);
    }
}

?>
