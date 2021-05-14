<?php
/**
 * Wizer.php
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
 * Wizer Provider
 * Amaze your students with smarter worksheets. Wizer.me is a platform where teachers build beauti...
 *
 * @link https://wizer.me
 *
 */
class Wizer extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.wizer.me/api/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.wizer.me'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~wizer\.me/(preview|learn)/([^/]+)~i', (string) $url));
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
