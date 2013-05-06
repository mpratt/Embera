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
     * Constructor
     *
     * @return void
     *
     * @throws RuntimeException when curls is not installed
     */
    public function __construct()
    {
        if (!function_exists('curl_init'))
            throw new \RuntimeException('Curl must be installed on your server!.');
    }

    /**
     * Executes http requests
     *
     * @param string $url
     * @return string
     *
     * @throws Exception when the returned status code is not 200 or no data was found
     */
    public function fetch($url = '')
    {
        $options = array(CURLOPT_URL => $url,
                         CURLOPT_FOLLOWLOCATION => true,
                         CURLOPT_CONNECTTIMEOUT => 10,
                         CURLOPT_ENCODING => 'UTF-8',
                         CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:2.0.1) Gecko/20110606 Firefox/4.0.1',
                         CURLOPT_RETURNTRANSFER => 1);

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $data = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (empty($data) || $status != 200)
            throw new \Exception('Invalid response or status code');

        return $data;
    }
}
?>
