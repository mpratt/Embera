<?php
/**
 * Spotify.php
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
 * Spotify Provider
 * @link https://play.spotify.com
 */
class Spotify extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://embed.spotify.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.spotify.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~spotify\.com/(?:track|album|playlist)/(?:[^/]+)(?:/[^/]*)?$~i', (string) $url) ||
            preg_match('~spotify\.com/user/(?:[^/]+)/playlist/(?:[^/]+)/?$~i', (string) $url)
            // preg_match('~spoti\.fi/(?:[^/]+)$~i', (string) $url)
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
