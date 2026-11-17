<?php
/**
 * ApplePodcasts.php
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
 * ApplePodcasts Provider
 *
 * @link https://podcasts.apple.com
 */
class ApplePodcasts extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://podcasts.apple.com/api/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'podcasts.apple.com'
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
        return (bool) (preg_match('~podcasts\.apple\.com/([a-z]{2}/)?podcast/([^/]+/)?id([0-9]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        // The query string is kept because it identifies the episode (?i=)
        $url->convertToHttps();

        return $url;
    }
}
