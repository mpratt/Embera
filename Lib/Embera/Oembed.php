<?php
/**
 * Oembed.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

class Oembed
{
    protected $http;

    /**
     * Construct
     *
     * @param object $http Instance of \Embera\HttpRequest
     * @return void
     */
    public function __construct(\Embera\HttpRequest $http) { $this->http = $http; }

    /**
     * Gets information about a resource
     *
     * @param string $apiUrl The Url to the Oembed provider
     * @param string $url    The original url, we want information from
     * @param array $params  An associative array with parameters to be sent to the
     *                       Oembed provider.
     * @return array
     */
    public function getResourceInfo($apiUrl, $url, array $params = array())
    {
        if (empty($params['oembed']))
            return array();

        return $this->lookup($this->constructUrl($apiUrl, array_merge($params, array('url' => $url))));
    }

    /**
     * Mocks a response from an Oembed provider
     *
     * @param array $fakeResponse Additional Parameters to be included on the fake response
     * @return array
     */
    public function buildFakeResponse(array $fakeResponse = array())
    {
        $defaults = array('version' => '1.0',
                          'url' => '',
                          'title' => '',
                          'author_name' => '',
                          'author_url' => '',
                          'cache_age' => 0,
                          'embera_using_fake' => 1);

        return array_merge($defaults, $fakeResponse);
    }

    /**
     ** Executes a http request to the given url and
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
        if ($json)
            return array_merge($json, array('embera_using_fake' => 0));

        return array();
    }

    /**
     * Builds a valid Oembed query string based on the given parameters,
     * Since this method uses the http_build_query function, there is no
     * need to pass urlencoded parameters, http_build_query already does
     * this for us.
     *
     * @param string $apiUrl The Url to the Oembed Api
     * @param array  $params Additional parameters for the query string
     * @return string
     */
    protected function constructUrl($apiUrl, array $params = array())
    {
        $params = array_filter($params);
        if (!empty($params['width']) && empty($params['maxwidth']))
            $params['maxwidth'] = $params['width'];

        if (!empty($params['height']) && empty($params['maxheight']))
            $params['maxheight'] = $params['height'];

        $params = array_intersect_key($params, array('url' => '', 'maxwidth' => '', 'maxheight' => '', 'format' => ''));
        if (!empty($params))
            return $apiUrl . ((strpos($apiUrl, '?') === false) ? '?' : '&') . http_build_query($params);

        return $apiUrl;
    }
}

?>
