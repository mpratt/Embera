<?php
/**
 * OembedClient.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Http;

use Embera\Embera;
use Embera\Http;
use Embera\Provider\ProviderInterface;

/**
 * This class manages requests and responses
 * from an Oembed Endpoint.
 *
 * TODO: Support xml responses
 */
class OembedClient
{
    /** @var array Configuration settings */
    protected $config = [];

    /** @var Http\HttpClientInterface */
    protected $http;

    /**
     * Construct
     *
     * @param array $config
     * @param HttpClientInterface $http
     * @return void
     */
    public function __construct($config, HttpClientInterface $http)
    {
        $this->config = $config;
        $this->http = $http;
    }

    /**
     * Gets the response from a given providerObject
     *
     * @param ProviderInterface $provider
     * @return array
     */
    public function getResponseFrom(ProviderInterface $provider)
    {
        if ($this->config['fake_responses'] == Embera::ONLY_FAKE_RESPONSES) {
            $response = $this->processFakeResponse($provider->getProviderName(), $provider->getFakeResponse());
        } else {
           $response = $this->lookup($provider);
        }

        return $provider->modifyResponse($response);
    }

    /**
     * Executes a http request to a url created by the $provider
     *
     * @param ProviderInterface $provider
     * @return array
     *
     * @throws \Exception From the Http object only if there is no way
     *                   to perform the request or if the response from
     *                   the server is empty/invalid.
     */
    protected function lookup(ProviderInterface $provider)
    {
        $url = $this->constructUrl($provider->getEndpoint(), $provider->getParams());
        $response = $this->http->fetch($url);
        $json = json_decode($response, true);

        if ($json) {
            return array_merge($json, [
                'embera_using_fake_response' => 0,
                'embera_provider_name' => $provider->getProviderName(),
            ]);
        }

        if ($this->config['fake_responses'] == Embera::ALLOW_FAKE_RESPONSES) {
            return $this->processFakeResponse($provider->getProviderName(), $provider->getFakeResponse());
        }

        return [];
    }

    /**
     * Builds a valid Oembed query string based on the given parameters,
     * Since this method uses the http_build_query function, there is no
     * need to pass urlencoded parameters, http_build_query already does
     * this for us.
     *
     * @param string $endpoint The Url to the Oembed endpoint
     * @param array  $params Parameters for the query string
     * @return string
     */
    protected function constructUrl($endpoint, array $params = array())
    {
        return $endpoint . ((strpos($endpoint, '?') === false) ? '?' : '&') . http_build_query(array_filter($params));
    }

    /**
     * Builds the fake response.
     * This replaces placeholders that are present in $config['fake']
     * into the response array
     *
     * @param string $providerName
     * @param array $response
     * @return array
     */
    protected function processFakeResponse($providerName, array $response)
    {
        $defaultValues = [
            'version' => '1.0',
            'provider_name' => '',
            'url' => '',
            'title' => '',
            'author_name' => '',
            'author_url' => '',
            'cache_age' => 0,
            'embera_using_fake_response' => 1,
            'embera_provider_name' => $providerName,
        ];

        if (!empty($response['html'])) {
            foreach ($this->config as $key => $v) {
                if (!is_string($v) && !is_numeric($v)) {
                    continue;
                }

                if (in_array($key, ['maxwidth', 'maxheight'])) {
                    $key = str_replace('max', '', $key);
                }

                $response['html'] = str_replace('{' . $key. '}', $v, $response['html']);
            }
        }

        return array_merge($defaultValues, $response);
    }

}
