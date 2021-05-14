<?php
/**
 * ScreenNine.php
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
 * ScreenNine Provider
 * No description.
 *
 * @link https://screen9.tv
 * @see https://screen9.zendesk.com/hc/en-us/articles/216335038-Publish-with-oEmbed
 */
class ScreenNine extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.screen9.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.screen9.tv', 'console.screen9.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~screen9\.(tv|com)/media/([^/]+)~i', (string) $url));
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
