<?php
/**
 * Vimeo.php
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
 * Vimeo Provider
 * Unlock the power of video and join over 200M professionals, teams, and organizations who use Vi...
 *
 * @link https://vimeo.com
 *
 */
class Vimeo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://vimeo.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'vimeo.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~vimeo\.com/(?:[0-9]{5,})$~i', (string) $url) ||
            preg_match('~vimeo\.com/channels/(?:[^/]+)/(?:[^/]+)~i', (string) $url) ||
            preg_match('~vimeo\.com/groups/(?:[^/]+)/videos/(?:[^/]+)~i', (string) $url) ||
            preg_match('~vimeo\.com/ondemand/(?:[^/]+)/(?:[^/]+)~i', (string) $url) ||
            preg_match('~vimeo\.com/(?:[0-9]{5,})/(?:[0-9a-z]+)$~i', (string) $url) ||
            preg_match('~vimeo\.com/video/(?:[^/]+)~i', (string) $url)
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
