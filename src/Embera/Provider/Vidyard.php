<?php
/**
 * Vidyard.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Vidyard Provider
 * Vidyard is an online video platform for business which allows you to increase leads, accelerate...
 *
 * @link https://vidyard.com
 * @see https://developer.vidyard.com/apidoc/oembed/show_v1_1.html
 */
class Vidyard extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.vidyard.com/dashboard/v1.1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.vidyard.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~vidyard\.com/watch/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
}
