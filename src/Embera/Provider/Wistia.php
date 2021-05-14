<?php
/**
 * Wistia.php
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
 * Wistia Provider
 * See how our video and podcast hosting, marketing tools, player customizations, and detailed ana...
 *
 * @link https://wistia.com
 *
 */
class Wistia extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://fast.wistia.com/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.wistia.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;
    
    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~wistia\.com/embed/(iframe|playlists)/([^/]+)~i', (string) $url) ||
            preg_match('~wistia\.com/medias/([^/]+)~i', (string) $url)
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
