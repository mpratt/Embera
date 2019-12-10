<?php
/**
 * UstreamTV.php
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
 * UstreamTV Provider
 * @link https://ustream.tv
 * @link https://video.ibm.com
 */
class UstreamTV extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://video.ibm.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ustream.tv', 'video.ibm.com', 'ustream.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ibm\.com/(channel|recorded)/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->setHost('video.ibm.com');
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

}
