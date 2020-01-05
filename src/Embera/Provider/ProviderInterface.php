<?php
/**
 * ProviderInterface.php
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
interface ProviderInterface
{
    /**
     * Validates that the url belongs to this service.
     * Should be implemented on all children and should
     * return a boolean
     *
     * @param Url $url
     *
     * @return bool|int
     */
    public function validateUrl(Url $url);

    /**
     * Construct
     *
     * @param string $url
     * @param array  $config
     *
     * @return void
     */
    public function __construct($url, array $config = []);

    /**
     * Returns an array with all the parameters for the oembed request
     *
     * @return array
     */
    public function getParams();

    /**
     * Returns the name of the current provider
     *
     * @return string
     */
    public function getProviderName();

    /**
     * Returns the provider Endpoint
     *
     * @return string
     */
    public function getEndpoint();

    /**
     * Returns the url (normalized and filtered)
     *
     * @param bool $asString Wether to return the url as a String or an Object
     * @return mixed
     */
    public function getUrl($asString = true);

    /**
     * Checks if the provider has support for HTTPS
     *
     * @return bool
     */
    public function hasHttpsSupport();

    /**
     * Checks if the provider supports responsive embeds.
     *
     * @return bool
     */
    public function hasResponsiveSupport();

    /**
     * Gives the ability to modify the response array
     * from the oembed provider.
     *
     * It should be overwritten by the provider when needed
     *
     * @param array $response
     * @return array
     */
    public function modifyResponse(array $response = []);

    /**
     * This method fakes a Oembed response.
     *
     * It should be overwritten by the provider
     * itself if the provider is capable to determine
     * an html embed code based on the url or by other methods.
     *
     * @return array with data that the basic oembed response should have
     */
    public function getFakeResponse();

    /**
     * Normalizes a url.
     * This method should be overwritten by the
     * Provider itself, if needed.
     *
     * @param Url $url
     * @return Url $url
     */
    public function normalizeUrl(Url $url);

    /**
     * Returns an array with hosts that belong to this provider.
     *
     * @return array
     */
    public static function getHosts();

}
