<?php
/**
 * Coub.php
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
 * Coub Provider
 * @link https://coub.com
 */
class Coub extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://coub.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'coub.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~coub\.com/(?:view|embed)/(?:\w+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeWWW();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/view/', '/embed/', $this->url) . '?maxheight={height}&maxwidth={width}';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'allowfullscreen="true"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="autoplay"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';

        return [
            'type' => 'video',
            'provider_name' => 'Coub',
            'provider_url' => 'http://coub.com/',
            'url' => (string) $this->url,
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
