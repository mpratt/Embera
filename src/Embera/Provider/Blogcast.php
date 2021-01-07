<?php
/**
 * Blogcast.php
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
 * Blogcast Provider
 * @link https://blogcast.host
 */
class Blogcast extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.blogcast.host/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'blogcast.host',
        'app.blogcast.host'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~blogcast\.host/(embed|embedly)/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeWWW();
        $url->removeLastSlash();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = $this->url;

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'style="width:100%;min-height:132px;overflow:hidden;"';

        return [
            'type' => 'rich',
            'provider_name' => 'Blogcast',
            'provider_url' => 'https://blogcast.host',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
