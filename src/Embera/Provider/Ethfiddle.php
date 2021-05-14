<?php
/**
 * Ethfiddle.php
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
 * Ethfiddle Provider
 * Share Solidity code snippets with friends, or check out cool
 * code snippets from around the web.
 *
 * @link https://ethfiddle.com
 */
class Ethfiddle extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://ethfiddle.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ethfiddle.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ethfiddle\.com/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~ethfiddle\.com/([^/]+)$~i', (string) $this->url, $m);
        $embedUrl = 'https://ethfiddle.com/services/iframesnippet/' . $m['1'];

        $attr = [];
        $attr[] = 'id="ef_' . $m['1'] . '"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'allowtransparency="true"';
        $attr[] = 'class="ef_embed_iframe"';
        $attr[] = 'style="width: 100%; overflow: hidden;"';

        return [
            'type' => 'rich',
            'provider_name' => 'Ethfiddle',
            'provider_url' => 'https://ethfiddle.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
