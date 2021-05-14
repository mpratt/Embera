<?php
/**
 * WaveVideo.php
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
 * WaveVideo Provider
 * Make your own videos and host them with Wave.video. Build your entire video funnel. Sign up now...
 *
 * @link https://wave.video
 *
 */
class WaveVideo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://embed.wave.video/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'watch.wave.video',
        'embed.wave.video'
    ];

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(watch|embed)\.wave\.video/([^/]+)$~i', (string) $url));
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
        preg_match('~/([a-z0-9_\-]+)$~i', (string) $this->url, $matches);

        $embedUrl = 'https://embed.wave.video/' . $matches['0'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="autoplay; fullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'WaveVideo',
            'provider_url' => 'https://wave.video',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
