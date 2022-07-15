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

use Embera\Http\HttpClient;
use Embera\Http\OembedClient;
use Embera\Http\HttpClientInterface;
use Embera\Html\IgnoreTags;
use Embera\Html\ResponsiveEmbeds;
use Embera\ProviderCollection\ProviderCollectionInterface;
use Embera\ProviderCollection\DefaultProviderCollection;

/**
 * Embera
 * The Main Class of this library.
 */
class Embera
{
    /** @var string Current Library Version */
    const VERSION = '2.0.27';

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

    /** @var array Closures to be used on oembed responses */
    protected $filters = [];

    /** @var ProviderCollectionInterface */
    protected $providerCollection;

    /** @var HttpClientInterface */
    protected $httpClient;

    /**
     * Constructor
     *
     * @param array $config
     * @param ProviderCollectionInterface $collection
     * @param HttpClientInterface $httpClient
     * @return void
     */
    public function __construct(array $config = [], ProviderCollectionInterface $collection = null, HttpClientInterface $httpClient = null)
    {
        $this->config = array_merge([
            'https_only' => false,
            'fake_responses' => self::ALLOW_FAKE_RESPONSES,
            'ignore_tags' => [ 'pre', 'code', 'a', 'img', 'iframe', 'oembed' ],
            'responsive' => false,
            'width' => 0,
            'height' => 0,
            'maxheight' => 0,
            'maxwidth' => 0,
            'referer' => '',
            'curl_params' => [],
            'file_get_contents_params' => [],
        ], $config);

        $this->config['maxwidth'] = max($this->config['width'], $this->config['maxwidth']);
        $this->config['maxheight'] = max($this->config['height'], $this->config['maxheight']);
        unset($this->config['height'], $this->config['width']);

        $this->providerCollection = $collection;
        if (!$collection) {
            $this->providerCollection = new DefaultProviderCollection($this->config);
        }

        $this->httpClient = $httpClient;
        if (!$httpClient) {
            $this->httpClient = new HttpClient($this->config);
        }

        // Set the config just in case.
        $this->providerCollection->setConfig($this->config);
        $this->httpClient->setConfig($this->config);
    }

    /**
     * Embeds known/available services into the given text.
     *
     * @param mixed $text
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

                if (!empty($this->config['ignore_tags']) && strpos($text, '>') !== false) {
                    $ignoreTags = new IgnoreTags($this->config['ignore_tags']);
                    return $ignoreTags->replace($text, $table);
                }

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
        foreach ($this->providerCollection->findProviders($urls) as $url => $provider) {
            try {

                $oembedClient = new OembedClient($this->config, $this->httpClient);
                $response = $oembedClient->getResponseFrom($provider);

                if ($this->config['responsive'] && !$provider->hasResponsiveSupport()) {
                    $responsive = new ResponsiveEmbeds();
                    $response = $responsive->transform($response);
                }

                $return[$url] = $this->applyFilters($response);

            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }

        return array_filter($return);
    }

    /**
     * Adds a filter to the oembed response
     *
     * @param callable $closure
     * @return void
     */
    public function addFilter(callable $closure)
    {
        $this->filters[] = $closure;
    }

    /**
     * Applies registered filters/closures
     * to the oembed response.
     *
     * @param array $response
     * @return array
     */
    protected function applyFilters(array $response)
    {
        foreach ($this->filters as $closure) {
            $response = $closure($response);
        }

        return $response;
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
