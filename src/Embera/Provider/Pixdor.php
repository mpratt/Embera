<?php
/**
 * Pixdor.php
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
 * Pixdor Provider
 * @link https://store.pixdor.com
 */
class Pixdor extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://store.pixdor.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'store.pixdor.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~store\.pixdor\.com/(map|place-marker-widget)/([^/]+)/show$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    public function getFakeResponse()
    {
        $embedUrl = str_replace('/show', '/embed.html', $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="max-width: 100%; max-height: 100%"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'data-keep-widget-ratio="true"';

        return [
            'type' => 'rich',
            'provider_name' => 'Pixdor',
            'provider_url' => 'https://www.pixdor.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
