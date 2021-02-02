<?php
/**
 * Instagram.php
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
 * Instagram Provider
 * @link https://instagram.com
 */
class Instagram extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://graph.facebook.com/v9.0/instagram_oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'instagram.com', 'instagr.am'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'callback', 'omitscript', 'breaking_change', 'access_token', 'fields' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~(instagram\.com|instagr\.am)/(?:p|tv)/([^/]+)/?$~i', (string) $url) ||
            preg_match('~(instagram\.com|instagr\.am)/([^/]+)/(?:p|tv)/([^/]+)/?$~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}
