<?php
/**
 * MixCloud.php
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
 * MixCloud Provider
 * No description.
 *
 * @link https://mixcloud.com
 *
 */
class MixCloud extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.mixcloud.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'mixcloud.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        if (preg_match('~mixcloud\.com/(?:categories|advertise|developers|discover|select)/(?:[^/]+)/?$~i', (string) $url)) {
            return false;
        }

        return (bool) (preg_match('~mixcloud\.com/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}
