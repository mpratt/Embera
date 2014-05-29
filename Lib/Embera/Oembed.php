<?php
/**
 * Oembed.php
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
 * This class manages requests and responses
 * from an Oembed Endpoint.
 *
 * TODO: Support xml responses
 */
class Oembed
{
    /** @var object Instance of \Embera\HttpRequest */
    protected $http;

    /**
     * Construct
     *
     * @param object $http Instance of \Embera\HttpRequest
     * @return void
     */
    public function __construct(\Embera\HttpRequest $http)
    {
        $this->http = $http;
    }

    /**
     * Gets information about a resource
     *
     * @param bool $behaviour Wether or not to use fake responses only
     * @param string $apiUrl The Url to the Oembed provider
     * @param string $url    The original url, we want information from
     * @param array $params  An associative array with parameters to be sent to the
     *                       Oembed provider.
     * @return array
     */
    public function getResourceInfo($behaviour, $apiUrl, $url, array $params = array())
    {
        if ($behaviour === false) {
            return array();
        }

        return $this->lookup($this->constructUrl($apiUrl, array_merge($params, array('url' => $url))));
    }

    /**
     * Executes a http request to the given url and
     * returns an associative array with the fetched data.
     *
     * @param string $url
     * @return array
     *
     * @throws Exception From the Http object only if there is no way
     *                   to perform the request or if the response from
     *                   the server is empty/invalid.
     */
    protected function lookup($url)
    {
        $response = $this->http->fetch($url);
        $json = json_decode($response, true);

        if ($json) {
            return array_merge(array('embera_using_fake' => 0), $json);
        }

        return array();
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
    protected function constructUrl($apiUrl, array $params = array())
    {
        return $apiUrl . ((strpos($apiUrl, '?') === false) ? '?' : '&') . http_build_query(array_filter($params));
    }
}

?>
