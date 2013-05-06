<?php
/**
 * Oembed.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

class Oembed
{
    protected $http;
    protected $service;
    protected $config;

    /**
     * Construct
     *
     * @param array $urls
     * @return void
     */
    public function __construct(\Embera\HttpRequest $http, array $config = array())
    {
        $this->http = $http;
        $this->config = array_merge(array('oembed' => true, 'width' => 420, 'height' => 315), $config);
    }

    /**
     * Sets the Service
     *
     * @param object $service Instance of \Embera\Adapters\Service
     * @return objetc Instance of this same object (used for method chaining);
     */
    public function setService(\Embera\Adapters\Service $service) { $this->service = $service; return $this; }

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
                                  'embera_offline_mode' => 1,
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

        $data = $this->http->fetch($this->translate($this->service->oEmbedUrl));
        if ($this->service->oEmbedFormat == 'json')
        {
            $json = json_decode($data, true);
            if ($json)
                return array_merge($json, array('embera_offline_mode' => 0));
        }

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
}

?>
