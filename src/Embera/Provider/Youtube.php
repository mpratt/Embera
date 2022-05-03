<?php
/**
 * Youtube.php
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
 * Youtube Provider
 * Disfruta los videos y la música que te encantan, sube contenido original y compártelo con tus...
 *
 * @link https://youtube.com
 * @see https://youtube-eng.googleblog.com/2009/10/oembed-support_9.html
 */
class Youtube extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.youtube.com/oembed?format=json&scheme=https';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'm.youtube.com', 'youtube.com', 'youtu.be',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~v=(?:[a-z0-9_\-]+)~i', (string) $url) ||
            preg_match('~/shorts/(?:[a-z0-9_\-]+)~i', (string) $url) ||
            preg_match('~/playlist(.+)list=(?:[a-z0-9_\-]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~(?:v=|youtu\.be/|youtube\.com/embed/)([a-z0-9_\-]+)~i', (string) $url, $matches)) {
            $url->overwrite('https://www.youtube.com/watch?v=' . $matches[1]);
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        if (preg_match('~v=([a-z0-9_\-]+)~i', (string) $this->url, $matches) || preg_match('~/shorts/([^/]+)~i', (string) $this->url, $matches)) {
            $embedUrl = 'https://www.youtube.com/embed/' . $matches['1'] . '?feature=oembed';
        } else if (preg_match('~/playlist(.+)list=([a-z0-9_\-]+)~i', (string) $this->url, $matches)) {
            $embedUrl = 'https://www.youtube.com/embed/videoseries?list=' . $matches['1'];
        } else {
            return array();
        }

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'Youtube',
            'provider_url' => 'https://www.youtube.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
