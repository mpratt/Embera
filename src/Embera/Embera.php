<?php
/**
 * Embera.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

use Embera\Http\OembedClient;
use Embera\Http\HttpClient;
use Embera\ProviderCollection\ProviderCollectionInterface;
use Embera\ProviderCollection\DefaultProviderCollection;

/**
 * Embera
 * The Main Class of this library.
 */
class Embera
{
    /**
     * Constants describing how the library is
     * going to handle fake responses.
     *
     * ALLOW_FAKE_RESPONSES is the default value.
     */
    const ALLOW_FAKE_RESPONSES = 1;
    const DISABLE_FAKE_RESPONSES = 2;
    const ONLY_FAKE_RESPONSES = 3;

    /** @var array Configuration settings */
    protected $config = [];

    /** @var array Logged errors */
    protected $errors = [];

    /** @var \Embera\ProviderCollection\ProviderCollectionInterface */
    protected $providerCollection;

    /**
     * Constructor
     *
     * @param array $config
     * @param ProviderCollectionInterface $collection
     * @return void
     */
    public function __construct(array $config = [], ProviderCollectionInterface $collection = null)
    {
        $this->providerCollection = $collection;
        if (!$collection) {
            $this->providerCollection = new DefaultProviderCollection();
        }

        $this->config = array_merge([
            'https_only' => false,
            'fake_responses' => self::ALLOW_FAKE_RESPONSES,
            'ignore_tags' => array('pre', 'code', 'a', 'img'),
            'responsive_embeds' => false,
            'width' => 0,
            'height' => 0,
            'maxheight' => 0,
            'maxwidth' => 0,
        ], $config);

        $this->config['maxwidth'] = max($this->config['width'], $this->config['maxwidth']);
        $this->config['maxheight'] = max($this->config['height'], $this->config['maxheight']);
        unset($this->config['height'], $this->config['width']);

        $this->providerCollection->setConfig($this->config);
    }

    /**
     * Embeds known/available services into the given text.
     *
     * @param string $text
     * @return string
     */
    public function autoEmbed($text)
    {
        if (is_string($text)) {

            $table = [];
            $providers = $this->getUrlData($text);
            foreach ($providers as $url => $response) {
                if (!empty($response['html'])) {
                    $table[$url] = $response['html'];
                }
            }

            if (!empty($table)) {
                return strtr($text, $table);
            }

        }  else {
            $this->errors[] = 'For auto-embedding purposes, the input must be a string';
        }

        return $text;
    }

    /**
     * Returns the oembed response from the given data.
     *
     * @param array|string $urls An array with urls or a string with urls.
     * @return array
     */
    public function getUrlData($urls)
    {
        $return = [];
        $oembedClient = new OembedClient($this->config, new HttpClient($this->config));
        foreach ($this->providerCollection->findProviders((array) $urls) as $url => $provider) {
            try {
                $return[$url] = $oembedClient->getResponseFrom($provider);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }

        return array_filter($return);
    }

    /**
     * Gets the last error found
     *
     * @return string
     */
    public function getLastError()
    {
        return end($this->errors);
    }

    /**
     * Returns an array with all the errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Checks if there were errors
     *
     * @return bool
     */
    public function hasErrors()
    {
        return (!empty($this->errors));
    }

}
