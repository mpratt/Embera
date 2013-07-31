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

    /** @var array Configuration Settings */
    protected $config = array();

    /** @var array Fetched errors */
    protected $errors = array();

    /** @var string The pattern used to extract urls from a text */
    protected $urlRegex = '~\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))~';
    protected $urlEmbedRegex = '~\bembed://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))~';

    /**
     * Constructs the object and also instantiates the \Embera\Oembed Object
     * and stores it into the $oembed properoty
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config = array())
    {
        $this->config = array_merge(array(
            'oembed' => true,
            'use_embed_prefix' => false,
        ), $config);
        $this->oembed = new \Embera\Oembed(new \Embera\HttpRequest());
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
            $this->errors[] = 'For autoEmbedding purposes, the input must be a string';
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
        $regex = $this->config['use_embed_prefix'] === true ? $this->urlEmbedRegex : $this->urlRegex;
        if (is_array($body))
        {
            foreach ($body as $key => $value)
            {
                if (preg_match_all($regex, $value, $matches) === 0)
                {
                    unset($body[$key]);
                }
            }
            if(empty($body) === false)
                $providers = new \Embera\Providers($body, $this->config, $this->oembed);
            else
                return array();
        }
        else if (preg_match_all($regex, $body, $matches))
            $providers = new \Embera\Providers($matches['0'], $this->config, $this->oembed);
        else
            return array();

        $services = $providers->getAll();
        return $this->clean($services);
    }

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
    public function getLastError()
    {
        if ($this->hasErrors())
            return end($this->errors);

        return ;
    }

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
