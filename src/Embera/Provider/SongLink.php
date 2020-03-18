<?php
/**
 * SongLink.php
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
 * SongLink Provider
 * @link https://song.link
 */
class SongLink extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://song.link/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'song.link',
        'album.link',
        'artist.link',
        'playlist.link',
        'pods.link',
        'mylink.page',
        'odesli.co',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~((song|album|artist|playlist|pods)\.link|mylink\.page|odesli\.co)/([^/]+)~i', (string) $url));
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
        $embedUrl = 'https://embed.song.link/?url=' . urlencode((string) $this->url);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowtransparency allowfullscreen';
        $attr[] = 'sandbox="allow-same-origin allow-scripts allow-presentation allow-popups allow-popups-to-escape-sandbox"';

        return [
            'type' => 'rich',
            'provider_name' => 'SongLink',
            'provider_url' => 'https://song.link',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
