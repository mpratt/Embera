<?php
/**
 * Hulu.php
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
 * Hulu Provider
 * @link https://hulu.com
 */
class Hulu extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.hulu.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'hulu.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~hulu\.com/watch/(?:[0-9]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~/watch/([0-9]+)~i', (string) $url, $matches)) {
            $url->overwrite('https://www.hulu.com/watch/' . $matches['1']);
        }

        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

}
