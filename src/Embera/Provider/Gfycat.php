<?php
/**
 * Gfycat.php
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
 * Gfycat Provider
 * Gfycat is the top destination for GIFs and videos. Create your own GIF or browse the best gamin...
 *
 * @link https://gfycat.com
 *
 */
class Gfycat extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.gfycat.com/v1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'gfycat.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        $invalid = [
            'api', 'terms', 'privacy', 'about', 'dmca', 'search',
            'popular-gifs', 'gaming', 'stickers', 'sound-gifs', 'discover',
            'upload', 'create', 'login', 'signup', 'jobs', 'partners', 'blog', 'faq',
            'support', 'gifbrewery', 'slack', 'pro',
        ];

        if (preg_match('~gfycat\.com/(?:' . implode('|', $invalid). ')$~', (string) $url)) {
            return false;
        }

        return (bool) (preg_match('~gfycat\.com/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();
        $url->removeWWW();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~gfycat\.com/([^/\-]+)~i', (string) $this->url, $matches);

        $embedUrl = 'https://gfycat.com/ifr/' . $matches['1'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'width="100%"';
        $attr[] = 'height="100%"';
        $attr[] = 'style="position:absolute;top:0;left:0;"';
        $attr[] = 'allowfullscreen';

        $html = [];
        $html[] = '<div style="position:relative;padding-bottom: calc(56.25% + 44px)"">';
        $html[] = '<iframe ' . implode(' ', $attr). '></iframe>';
        $html[] = '</div>';

        return [
            'type' => 'video',
            'provider_name' => 'Gfycat',
            'provider_url' => 'https://gfycat.com',
            'title' => 'Unknown title',
            'html' => implode('', $html),
        ];
    }

}
