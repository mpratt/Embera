<?php
/**
 * Shoudio.php
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
 * Shoudio Provider
 * @link https://shoudio.com
 */
class Shoudio extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://shoudio.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'shoudio.com', 'shoud.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = false;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~shoudio\.com/(?:user|channel|venue|collection)/([^/]+)~i', (string) $url) ||
            preg_match('~shoud\.io/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        // Important or the oembed endpoint doesnt work
        $url->convertToHttp();

        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

}
