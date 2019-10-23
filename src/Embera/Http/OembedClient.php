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

use Embera\Provider\ProviderInterface;

/**
 * This class manages requests and responses
 * from an Oembed Endpoint.
 *
 * TODO: Support xml responses
 */
class Oembed
{
    /** @var array Configuration settings */
    protected $config = [];

    /** @var Embera\Http\HttpClient */
    protected $http;

    /**
     * Construct
     *
     * @param array $config
     * @param Embera\Http\HttpClient $http
     * @return void
     */
    public function __construct($config, HttpClient $http)
    {
        $this->config = $config;
        $this->http = $http;
    }

    /**
     * Gets the response from a given providerObject
     *
     * @param \Embera\Provider\ProviderInterface $provider
     * @return array
     */
    public function getResponseFrom(ProviderInterface $provider)
    {
        if ($this->config['fake_responses'] == Embera::ONLY_FAKE_RESPONSES) {
            $response = $provider->getFakeResponse();
        } else {
           $response = $this->lookup($provider);
        }

        return $provider->modifyResponse($response);
    }

    /**
     * Executes a http request to a url created by the $provider
     *
     * @param \Embera\Provider\ProviderInterface $provider
     * @return array
     *
     * @throws Exception From the Http object only if there is no way
     *                   to perform the request or if the response from
     *                   the server is empty/invalid.
     */
    protected function lookup(ProviderInterface $provider)
    {
        $url = $this->constructUrl($provider->getEndpoint(), $provider->getParams());
        $response = $this->http->fetch($url);
        $json = json_decode($response, true);

        if ($json) {
            return array_merge($json, ['embera_using_fake_response' => 0]);
        }

        if ($this->config['fake_responses'] == Embera::ALLOW_FAKE_RESPONSES) {
            return $provider->getFakeResponse();
        }

        return [];
    }

    /**
     * Builds a valid Oembed query string based on the given parameters,
     * Since this method uses the http_build_query function, there is no
     * need to pass urlencoded parameters, http_build_query already does
     * this for us.
     *
     * @param string $apiUrl The Url to the Oembed Api
     * @param array  $params Parameters for the query string
     * @return string
     */
    protected function constructUrl($endpoint, array $params = array())
    {
        return $endpoint . ((strpos($endpoint, '?') === false) ? '?' : '&') . http_build_query(array_filter($params));
    }

}
