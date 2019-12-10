<?php
/**
 * Twitter.php
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
 * Twitter Provider
 * @link https://twitter.com
 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-oembed
 */
class Twitter extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://publish.twitter.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'twitter.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [
        'maxwidth', 'maxheight', 'hide_media', 'hide_thread', 'omit_script', 'align',
        'related', 'lang', 'theme', 'link_color', 'widget_type', 'dnt'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~twitter\.com/(?:[^/]+)/(?:status|moments)/(?:[0-9]+)~i', (string) $url));
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
