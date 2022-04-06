<?php
/**
 * Pandavideo.php
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
 * Pandavideo Provider
 *
 * @link https://pandavideo.com
 */
class Pandavideo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api-v2.pandavideo.com.br/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.tv.pandavideo.com.br'
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
        return (bool) (
            preg_match('~pandavideo\.com\.br/embed/\?v\=([^/]+)~i', (string) $url) ||
            preg_match('~pandavideo\.com\.br/(.+)playlist\.m3u8$~i', (string) $url) ||
            preg_match('~pandavideo\.com\.br/#/videos/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }
}
