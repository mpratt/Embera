<?php
/**
 * MarbellaWire.php
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
 * MarbellaWire Provider
 *
 * @link https://marbellawire.com
 */
class MarbellaWire extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.marbellawire.com/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'marbellawire.com'
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
        return (bool) (preg_match('~marbellawire\.com/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }
}
