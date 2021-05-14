<?php
/**
 * GetShow.php
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
 * GetShow Provider
 * Show offers a full suite of platforms for Video first Marketing(VFM) marketing. It helps market...
 *
 * @link https://getshow.io
 * @see https://getshow.io/support/oembed
 */
class GetShow extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.getshow.io/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.getshow.io'
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
            preg_match('~getshow\.io/share/([^/]+)~i', (string) $url) ||
            preg_match('~getshow\.io/embed/iframe/~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeLastSlash();

        return $url;
    }

}
