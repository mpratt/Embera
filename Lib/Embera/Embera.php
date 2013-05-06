<?php
/**
 * Embera.php
 * The main class of this library.
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

class Embera
{
    const VERSION = '0.1';
    protected $config = array();
    protected $http;
    protected $urlRegex = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';

    /**
     * Construct
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config = array())
    {
        $this->http = new \Embera\HttpRequest();
        $this->config = array_merge(array('oembed' => true, 'width'  => 420, 'height' => 315), $config);
    }

    /**
     * Embeds known services into the string
     *
     * @param string $body
     * @return string
     *
     * @throws InvalidArgumentException when the $body is not a string
     */
    public function autoEmbed($body = null)
    {
        if ($data = $this->getUrlInfo($body))
        {
            if (!is_string($body))
                throw new \InvalidArgumentException('Input must be of type string');

            $table = array();
            foreach ($data as $url => $service)
            {
                if (!empty($service['html']))
                    $table[$url] = $service['html'];
            }

            return str_replace(array_keys($table), array_values($table), $body);
        }

        return $body;
    }

    /**
     * Finds all the information about a link/url
     *
     * @param string|array $body An array full with urls or  string
     * @return array
     */
    public function getUrlInfo($body = null)
    {
        $results = array();
        if ($providers = $this->getProviders($body))
        {
            foreach ($providers as $url => $service)
            {
                if ($response = $this->requestOembedData($service))
                    $results[$url] = $response;
            }
        }

        return $results;
    }

    /**
     * Finds all the valid urls inside $body.
     *
     * @param string|array $body An array full with urls or  string
     * @return array An array with all the detected providers
     */
    protected function getProviders($body = null)
    {
        if (is_array($body))
            $providers = new \Embera\Providers($body);
        else if (preg_match_all($this->urlRegex, $body, $matches))
            $providers = new \Embera\Providers($matches['0']);
        else
            return array();

        return $providers->getAll();
    }

    /**
     * Returns an array with the information about a
     * service/url.
     *
     * @param object $service
     * @return array
     */
    protected function requestOembedData(\Embera\Adapters\Service $service)
    {
        return (new \Embera\Oembed($this->http, $this->config))->setService($service)->getResourceInfo();
    }
}

?>
