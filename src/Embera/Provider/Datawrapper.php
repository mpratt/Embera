<?php
/**
 * Datawrapper.php
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
 * Datawrapper Provider
 * Enrich your stories with charts, maps, and tables.
 *
 * @link https://datawrapper.de
 * @see https://developer.datawrapper.de/reference#getoembed
 */
class Datawrapper extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.datawrapper.de/v3/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'datawrapper.dwcdn.net'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'iframe' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~datawrapper\.dwcdn\.net/([^/]+)/([^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}
