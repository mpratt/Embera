<?php
/**
 * Heyzine.php
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
 * Heyzine Provider
 *
 * @link https://heyzine.com
 * @see https://heyzine.com/developers#oembed
 */
class Heyzine extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://heyzine.com/api1/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'heyzine.com',
        '*.hflip.co',
        '*.aflip.in',
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~heyzine\.com/flip-book/([^/]+)~i', (string) $url) ||
            preg_match('~(h|a)flip\.com/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }
}
