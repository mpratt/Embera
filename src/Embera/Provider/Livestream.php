<?php
/**
 * Livestream.php
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
 * Livestream Provider
 * @link https://livestream.com
 */
class Livestream extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://livestream.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'livestream.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~livestream\.com/accounts/([^/]+)/events/([^/]+)(/([^/]+)/videos/([^/]+))?~i', (string) $url) ||
            preg_match('~livestream\.com/([^/]+)/events/([^/]+)(/videos/([^/]+))?~i', (string) $url) ||
            preg_match('~livestream\.com/([^/]+)/([^/]+)(/videos/([^/]+))?~i', (string) $url)
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
