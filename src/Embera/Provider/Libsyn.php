<?php
/**
 * Libsyn.php
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
 * Libsyn Provider
 * Libsyn has been an official podcast launch partner for the most popular media companies.
 *
 * @link https://libsyn.com
 */
class Libsyn extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://oembed.libsyn.com/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.libsyn.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        if (preg_match('~https?://(.+).libsyn\.com/([^/]+)~i', (string) $url, $matches)) {
            return (!empty($matches['1']) && strtolower($matches['1']) != 'www');
        }

        return false;
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
