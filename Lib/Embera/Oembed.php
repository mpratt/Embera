<?php
/**
 * Oembed.php
 *
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Embera;

class Oembed
{
    protected $service;
    protected $config;

    /**
     * Construct
     *
     * @param array $urls
     * @return void
     */
    public function __construct(\Embera\Adapters\Service $service, array $config = array())
    {
        $this->service = $service;
        $this->config  = array_merge(array('oembed' => true, 'width' => 420, 'height' => 315), $config);
    }

    /**
     * This method returns an associative array that mocks
     * a response from an Oembed service.
     *
     * @return array|bool False when no information was found
     */
    public function getResourceInfo($lookup = true)
    {
        if ($this->config['oembed'] && $lookup)
        {
            try {
                return $this->executeLookup();
            } catch(\Exception $e) {
                return $this->getResourceInfo(false);
            }
        }
        else if ($fakeResponse = $this->service->fakeOembedResponse())
        {
            if (!empty($fakeResponse['html']))
            {
                $defaults = array('version' => '1.0',
                                  'url' => $this->service->getOriginalUrl(),
                                  'title' => $this->service->getOriginalUrl(),
                                  'author_name' => '',
                                  'author_url' => '',
                                  'cache_age' => 0,
                                  'offline_mode' => 1,
                                  'width'  => $this->config['width'],
                                  'height' => $this->config['height']);

                $fakeResponse['html'] = $this->translate($fakeResponse['html']);
                return array_merge($defaults, $fakeResponse);
            }
        }

        return array();
    }

    /**
     * Executes a http request to the oembed
     * url ands returns an associative array with
     * the fetched data.
     *
     * @return array
     *
     * @throws Exception when the service doesnt have valid oembed settings
     * @throws InvalidArgumentException when the oEmbedFormat is not json
     */
    protected function executeLookup()
    {
        if (empty($this->service->oEmbedUrl))
            throw new \Exception('Unknown oEmbedUrl given');

        $data = $this->http($this->translate($this->service->oEmbedUrl));
        if ($this->service->oEmbedFormat == 'json')
            return array_merge(json_decode($data, true), array('offline_mode' => 0));

        throw new \InvalidArgumentException('This library only supports json data.');
    }

    /**
     * Converts placeholders to an actual translation.
     *
     * @param string $body
     * @return string
     */
    protected function translate($body = '')
    {
        $table = array('{url}' => urlencode($this->service->getOriginalUrl()),
                       '{format}' => (!empty($this->service->oEmbedFormat) ? $this->service->oEmbedFormat : 'json'),
                       '{height}' => $this->config['height'],
                       '{width}'  => $this->config['width']);

        return str_replace(array_keys($table), array_values($table), $body);
    }

    /**
     * Executes http requests
     *
     * @param string $url
     * @return string
     *
     * @throws RuntimeException when curls is not installed
     * @throws Exception when the returned status code is not 200 or no data was found
     */
    protected function http($url = '')
    {
        if (!function_exists('curl_init'))
            throw new \RuntimeException('Curl must be installed on your server!.');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:2.0.1) Gecko/20110606 Firefox/4.0.1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (empty($data) || $status != 200)
            throw new \Exception('Invalid response or status code');

        return $data;
    }
}

?>
