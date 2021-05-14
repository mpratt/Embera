<?php
/**
 * Audiomack.php
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
 * Audiomack Provider
 * Audiomack is a youth-driven, artist-first music streaming platform that allows creators
 * to share unlimited music and podcast content for free.
 *
 * @link https://www.audiomack.com
 *
 */
class Audiomack extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.audiomack.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'audiomack.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~audiomack\.com/(?:song|album|playlist)/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url) ||
            preg_match('~audiomack\.com/(?:[^/]+)/(?:song|album|playlist)/(?:[^/]+)/?$~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('audiomack.com/', 'audiomack.com/embed/', $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'scrollbars="no"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'Audiomack',
            'provider_url' => 'https://www.audiomack.com/',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
