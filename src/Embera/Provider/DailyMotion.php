<?php
/**
 * DailyMotion.php
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
 * dailymotion.com Provider
 * @link https://dailymotion.com
 * @link https://developer.dailymotion.com/player/#player-oembed
 */
class DailyMotion extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.dailymotion.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'callback', 'autoplay', 'syndication' ];

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.dailymotion.com', 'dai.ly'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (preg_match('~dailymotion\.com/video/(?:[^/]+)/?~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->addWWW();
        $url->removeLastSlash();
        $url->removeQueryString();

        if (preg_match('~dailymotion\.com/(?:embed/)?(?:video|live)/([^/]+)/?~i', (string) $url, $matches)) {
            $url->overwrite('https://www.dailymotion.com/video/' . $matches['1']);
        } else if (preg_match('~dai\.ly/([^/]+)/?~i', (string) $url, $matches)) {
            $url->overwrite('https://www.dailymotion.com/video/' . $matches['1']);
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~/video/([^/]+)~i', (string) $this->url, $matches);
        @list($videoId, $videoTitle) = explode('_', $matches['1'], 2);

        $embedUrl = 'http://www.dailymotion.com/embed/video/' . $videoId;

        $attr = [];
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'allowfullscreen';
        $attr[] = 'allow="autoplay"';

        return [
            'type' => 'video',
            'provider_name' => 'Dailymotion',
            'provider_url' => 'http://www.dailymotion.com',
            'title' => (!empty($videoTitle) ? str_replace(array('-', '_'), ' ', $videoTitle) : 'Unknown Title'),
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
