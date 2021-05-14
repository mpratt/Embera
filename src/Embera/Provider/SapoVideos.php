<?php
/**
 * SapoVideos.php
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
 * SapoVideos Provider
 * Golos, trailers, vídeos para rir, notícias, programas de TV e muito mais. Os vídeos que inte...
 *
 * @link https://videos.sapo.pt
 *
 */
class SapoVideos extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://rd.videos.sapo.pt/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'videos.sapo.pt', 'rd.videos.sapo.pt'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~videos\.sapo\.pt/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->overwrite(str_replace('#vhs-', '', (string) $url));
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = '//rd.videos.sapo.pt/playhtml?file=' . $this->url . '/mov/1&quality=sd';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'SapoVideos',
            'provider_url' => 'https://videos.sapo.pt',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
