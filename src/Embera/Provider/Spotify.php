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
 * En Spotify, puedes encontrar toda la música que necesitas.
 *
 * @link https://spotify.com
 * @see  https://developer.spotify.com/documentation/embeds/reference/oembed
 *
 */
class Spotify extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://open.spotify.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'open.spotify.com',
        'spotify.link'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~spotify\.com/(?:intl-[a-z]{2}/|)(?:track|album|playlist|show|episode|artist)/(?:[^/]+)(?:/[^/]*)?$~i', (string) $url) ||
            preg_match('~spotify\.com/user/(?:[^/]+)/playlist/(?:[^/]+)/?$~i', (string) $url) ||
            preg_match('~spotify\.link/(?:[^/]+)~i', (string) $url)
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
