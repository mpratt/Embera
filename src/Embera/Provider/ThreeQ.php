<?php
/**
 * ThreeQ.php
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
 * ThreeQ Provider
 *
 * @link https://playout.3qsdn.com
 * @see https://docs.3q.video/en/Player_API/Basic_usage.html
 */
class ThreeQ extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://playout.3qsdn.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'playout.3qsdn.com'
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
        return (bool) (preg_match('~playout\.3qsdn\.com/embed/([^/]+)~i', (string) $url));
    }

    public function getUrl($asString = true)
    {
        if ($asString) {
            preg_match('~/embed/([^/]+)~i', (string) $this->url, $matches);
            return $matches[1];
        }

        return $this->url;
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
