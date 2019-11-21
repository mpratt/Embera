<?php
/**
 * Fontself.php
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
 * Fontself Provider
 * @link https://catapult.fontself.com
 */
class Fontself extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://oembed.fontself.com/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'catapult.fontself.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~fontself\.com/([^/]+)/([^/]+)$~i', (string) $url));
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
        preg_match('~fontself\.com/([^/]+)/([^/]+)$~i', (string) $this->url, $matches);

        $embedUrl = 'https://catapult-embed.fontself.com/?url=' . $this->url;

        $attr = [];
        $attr[] = 'height="{height}"';
        $attr[] = 'style="width:100%; border: 1px solid lightgrey;"';
        $attr[] = 'id="fs_embed_' . $matches['1'] . '_' . $matches['2'] . '"';
        $attr[] = 'class="fs_embed_iframe"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'title="' . str_replace('_', ' ', $matches['2']) . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'Fontself',
            'provider_url' => 'https://fontself.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
