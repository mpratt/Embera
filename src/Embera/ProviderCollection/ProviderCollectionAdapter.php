<?php
/**
 * ProviderCollectionAdapter.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\ProviderCollection;

use ReflectionClass;

/**
 * This is the adapter which has the main logic for
 * the provider collection behaviour.
 *
 * Its main function is to accept urls as input and return
 * matching providers.
 */
abstract class ProviderCollectionAdapter implements ProviderCollectionInterface
{
    /** @var array Configuration Settings */
    protected $config = [];

    /** @var array Hosts with wildcards, calculated at runtime */
    protected $wildCardHosts = [];

    /** @var array Massive array with the mapping of host -> provider relation. */
    protected $providers = [];

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
            'https_only' => false,
            'url_extractor_regex' => '~\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/|_))~i',
        ], $config);
    }

    /** inline {@inheritdoc} */
    public function addProvider($host, $class)
    {
        $host = preg_replace('~^(?:www)\.~i', '', strtolower($host));
        $this->providers[$host] = $class;
    }

    /** inline {@inheritdoc} */
    public function filter($providerName)
    {
        if (is_callable($providerName)) {
            $list = array_filter($this->providers, $providerName);
        } else {
            $list = array_filter($this->providers, static function ($class) use ($providerName) {
                return (strtolower($providerName) == strtolower($class));
            });
        }

        $newCollection = new static($this->config);
        $newCollection->setProviderList($list);

        return $newCollection;
    }

    /** inline {@inheritdoc} */
    public function findProviders($data)
    {
        $urls = $this->extractUrls($data);
        if (empty($urls)) {
            return [];
        }

        $this->wildCardHosts = array_filter(array_keys($this->providers), static function($key) {
            return (strpos($key, '*') !== false);
        });

        return $this->extractProviders(array_unique($urls));
    }

    /** inline {@inheritdoc} */
    public function setProviderList(array $list)
    {
        $this->providers = $list;
    }

    /** inline {@inheritdoc} */
    public function registerProvider($names, $prefix = true)
    {
        foreach ((array) $names as $name) {
            if ($prefix) {
                $name = 'Embera\Provider\\' . $name;
            }

            $hosts = $name::getHosts();
            foreach ($hosts as $h) {
                $this->providers[$h] = $name;
            }
        }
    }

    /**
     * Extract the urls from a given text or array
     *
     * @param mixed $data
     * @return array with found urls
     */
    protected function extractUrls($data)
    {
        $regex = $this->config['url_extractor_regex'];

        if (is_array($data)) {
            return array_filter($data, static function ($arr) use ($regex) {
                return preg_match($regex, $arr);
            });
        }

        if (preg_match_all($regex, $data, $matches)) {
            return array_filter($matches['0']);
        }

        return [];
    }

    /**
     * Returns an array with supported providers
     *
     * @param array $urls An array with urls
     * @return array An Array with loaded services
     */
    protected function extractProviders(array $urls = [])
    {
        $return = [];
        foreach ($urls as $u) {
            if ($provider = $this->getProvider($u)) {
                $return[$u] = $provider;
            }
        }

        return $return;
    }

    /**
     * Gets a normalized host for the given $url
     *
     * @param string $url
     * @return mixed The provider Object
     */
    protected function getProvider($url)
    {
        if ($data = parse_url($url)) {
            $data = array_merge(['host' => ''], $data); // Just in case we didnt find a host
            $host = preg_replace('~^(?:www|player)\.~i', '', strtolower($data['host']));
            if (isset($this->providers[$host])) {
                return $this->initializeProvider($this->providers[$host], $url);
            } else if (isset($this->providers['*.' . $host])) {
                return $this->initializeProvider($this->providers['*.' . $host], $url);
            }

            foreach ($this->wildCardHosts as $value) {
                $regex = strtr(preg_quote($value, '~'), ['\*' => '(?:.*)']);
                if (preg_match('~' . $regex . '~i', $host)) {
                    $this->providers[$host] = $this->providers[$value];
                    return $this->initializeProvider($this->providers[$value], $url);
                }
            }
        }

        return false;
    }

    /**
     * Initializes a provider from the given $class and $url
     *
     * @param string $class The name of the class
     * @param string $url The associated url
     * @return object|bool
     */
    protected function initializeProvider($class, $url)
    {
        if (strpos($class, '\\') === false) {
            $class = 'Embera\Provider\\' . $class;
        }

        $reflection = new ReflectionClass($class);
        $provider = $reflection->newInstance($url, $this->config);

        if (!$provider->validateUrl($provider->getUrl(false)) ||
            ($this->config['https_only'] && !$provider->hasHttpsSupport())) {
            return false;
        }

        return $provider;
    }

}
