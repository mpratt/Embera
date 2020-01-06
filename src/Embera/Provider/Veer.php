<?php
/**
 * Veer.php
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
 * Veer Provider
 * @link https://veer.tv
 */
class Veer extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.veer.tv/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'veer.tv', 'veervr.tv'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~veer\.tv/videos/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->setHost('veer.tv');
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~-([0-9]+)$~', (string) $this->url, $m);

        $embedUrl = 'http://h5.veer.tv/player?vid=' . $m['1'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowfullscreen="true"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';

        return [
            'type' => 'video',
            'provider_name' => 'Veer Vr',
            'provider_url' => 'https://veer.tv',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
