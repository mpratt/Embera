<?php
/**
 * ProviderAdapter.php
 *
 * @package Adapters
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * ProviderAdapter has boilerplate methods that help remove code
 * from the other providers. It has the basic boilerplate to instantiate
 * and validate Providers.
 */
abstract class ProviderAdapter
{
    /**  @var Url */
    protected $url;

    /**  @var array with hosts where the provider belongs */
    protected static $hosts = [];

    /** @var array Associative array with config/parameters to be sent to the oembed provider */
    protected $config = [];

    /** @var array Array with allowed params for the current Provider */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** @var string The api url for the current service */
    protected $endpoint = null;

    /** @var bool Wether the provider supports https */
    protected $httpsSupport = false;

    /** @var bool Wether the provider supports responsive embeds */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function __construct($url, array $config = [])
    {
        $this->config = $config;
        $this->url = $this->normalizeUrl(new Url($url));
    }

    /** inline {@inheritdoc} */
    public function getParams()
    {
        $params = [];
        foreach ($this->allowedParams as $key) {
            if (isset($this->config[$key])) {
                $params[$key] = $this->config[$key];
            }

            $customKey = strtolower($this->getProviderName() . '_' . $key);
            if (isset($this->config[$customKey])) {
                $params[$key] = $this->config[$customKey];
            }
        }

        return array_filter(array_merge($params,[
            'url' => $this->getUrl(),
        ]));
    }

    /** inline {@inheritdoc} */
    public function getProviderName()
    {
        return basename(str_replace('\\', '/', get_class($this)));
    }

    /** inline {@inheritdoc} */
    public function getEndpoint()
    {
        return (string) $this->endpoint;
    }

    /** inline {@inheritdoc} */
    public function getUrl($asString = true)
    {
        if ($asString) {
            return $this->url->__toString();
        }

        return $this->url;
    }

    /** inline {@inheritdoc} */
    public function hasHttpsSupport()
    {
        return (bool) $this->httpsSupport;
    }

    /** inline {@inheritdoc} */
    public function hasResponsiveSupport()
    {
        return (bool) $this->responsiveSupport;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        return array();
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        return $url;
    }

    /** inline {@inheritdoc} */
    public static function getHosts()
    {
        return static::$hosts;
    }

    /** inline {@inheritdoc} */
    public static function addHost($host)
    {
        static::$hosts[] = $host;
    }

}
