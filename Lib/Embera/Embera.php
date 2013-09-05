<?php
/**
 * Embera.php
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
 * The Main Class of this library
 */
class Embera
{
    /** @var int Class constant with the current Version of this library */
    const VERSION = '0.1';

    /** @var object Instance of \Embera\Oembed */
    protected $oembed;

    /** @var object Instance of \Embera\Providers */
    protected $providers;

    /** @var array Configuration Settings */
    protected $config = array();

    /** @var array Fetched errors */
    protected $errors = array();

    /** @var string The pattern used to extract urls from a text */
    protected $urlRegex = '~\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))~i';

    /** @var string The pattern used to extract urls from a text when the embed:// prefix option is enabled */
    protected $urlEmbedRegex = '~\bembed://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))~i';

    /**
     * Constructs the object and also instantiates the \Embera\Oembed Object
     * and stores it into the $oembed properoty
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config = array())
    {
        $this->config = self::_recursiveMergeOverwrite(array(
            'oembed' => true,
            'use_embed_prefix' => false,
            'params' => array(
                'width' => 0,
                'maxwidth' => 0,
                'height' => 0,
                'maxheight' => 0,
            ),
            'custom_params' => array(),
            'http' => array(),
            'fake' => array(),
        ), $config);

        $this->config['params']['maxwidth'] = max($this->config['params']['width'], $this->config['params']['maxwidth']);
        $this->config['params']['maxheight'] = max($this->config['params']['height'], $this->config['params']['maxheight']);
        unset($this->config['params']['height'], $this->config['params']['width']);

        $this->oembed = new \Embera\Oembed($this->config['oembed'], new \Embera\HttpRequest($this->config['http']));
        $this->providers = new \Embera\Providers($this->config, $this->oembed);
    }
    
    /**
     * Merges deep associative arrays.
     *
     * @access protected
     * @author Oliver Lillie
     * @param array $array1 
     * @param array $array2 
     * @return array
     */
    protected static function _recursiveMergeOverwrite($array1, $array2)
    {
        foreach($array2 as $key => $val)
        {
            if(array_key_exists($key, $array1) === true && is_array($val) === true)
            {
                $array1[$key] = self::_recursiveMergeOverwrite($array1[$key], $val);
            }
            else
            {
                $array1[$key] = $val;
            }
        }
        
        return $array1;
    }

    /**
     * Embeds known/available services into the
     * given text.
     *
     * @param string $body
     * @return string
     */
    public function autoEmbed($body = null)
    {
        if (!is_string($body))
            $this->errors[] = 'For auto-embedding purposes, the input must be a string';
        else if ($data = $this->getUrlInfo($body))
        {
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
     * Finds all the information about a url (or a collection of urls)
     *
     * @param string|array $body An array or string with urls
     * @return array
     */
    public function getUrlInfo($body = null)
    {
        $results = array();
        if ($providers = $this->getProviders($body))
        {
            foreach ($providers as $url => $service)
            {
                $results[$url] = $service->getInfo();
                $this->errors = array_merge($this->errors, $service->getErrors());
            }
        }

        return array_filter($results);
    }

    /**
     * Finds all the valid urls inside the given text,
     * compares which are allowed and returns an array
     * with the detected providers
     *
     * @param string|array $body An array or string with Urls
     * @return array
     */
    protected function getProviders($body = '')
    {
        $regex = ($this->config['use_embed_prefix'] === true ? $this->urlEmbedRegex : $this->urlRegex);
        if (is_array($body))
        {
            $body = array_filter($body, function ($a) use ($regex){
                return preg_match($regex, $a);
            });

            $services = $this->providers->getAll($body);
        }
        else if (preg_match_all($regex, $body, $matches))
            $services = $this->providers->getAll($matches['0']);
        else
            return array();

        return $this->clean($services);
    }

    /**
     * Adds a new Provider into the service map
     *
     * @param string $host The host for the map
     * @param string|object $class The class or object that should manage the provider
     * @param array $params Custom parameters that should be sent in the url for this Provider
     * @return void
     */
    public function addProvider($host, $class, array $params = array()) { $this->providers->addProvider($host, $class, $params); }

    /**
     * Strips invalid providers from the list
     *
     * @param array $services
     * @return array
     */
    protected function clean(array $services = array())
    {
        if (empty($services))
            return array();

        if (!empty($this->config['allow']))
        {
            $allow = array_map('strtolower', (array) $this->config['allow']);
            $services = array_filter($services, function($a) use ($allow) {
                $serviceName = strtolower(basename(str_replace('\\', '/', get_class($a))));
                return (in_array($serviceName, $allow));
            });
        }

        if (!empty($services) && !empty($this->config['deny']))
        {
            $deny = array_map('strtolower', (array) $this->config['deny']);
            $services = array_filter($services, function($a) use ($deny) {
                $serviceName = strtolower(basename(str_replace('\\', '/', get_class($a))));
                return (!in_array($serviceName, $deny));
            });
        }

        return (array) $services;
    }

    /**
     * Gets the last error found
     *
     * @return string
     */
    public function getLastError() { return end($this->errors); }

    /**
     * Returns an array with all the errors
     *
     * @return array
     */
    public function getErrors() { return $this->errors; }

    /**
     * Checks if there were errors
     *
     * @return bool
     */
    public function hasErrors() { return (!empty($this->errors)); }
}

?>
