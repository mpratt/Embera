<?php
/**
 * VoxSnap.php
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
 * VoxSnap Provider
 * Let your content be heard! Create audio blogs, podcasts, Amazon Alexa or Google Home content, a...
 *
 * @link https://voxsnap.com
 *
 */
class VoxSnap extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://data.voxsnap.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'article.voxsnap.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~voxsnap\.com/([^/]+)/([^/]+)~i', (string) $url));
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
        preg_match('~voxsnap\.com/([^/]+)/([^/]+)~i', (string) $this->url, $matches);

        $embedUrl = 'https://player.voxsnap.com/oembed/' . $matches['1'] . '/' . $matches['2'];

        $attr = [];
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'VoxSnap',
            'provider_url' => 'https://article.voxsnap.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
