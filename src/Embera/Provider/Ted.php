<?php
/**
 * Ted.php
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
 * Ted Provider
 * TED Talks are influential videos from expert speakers on education, business, science, tech and...
 *
 * @link https://ted.com
 *
 */
class Ted extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.ted.com/services/v1/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ted.com',
        'embed.ted.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ted\.com/talks/([^/]+)~i', (string) $url));
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
        $this->url->setHost('embed.ted.com');

        $attr = [];
        $attr[] = 'src="' . preg_replace('~\.html$~i', '', (string) $this->url) . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'title=""';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="autoplay; fullscreen; encrypted-media; picture-in-picture"';
        $attr[] = 'referrerpolicy="strict-origin-when-cross-origin"';
        $attr[] = 'loading="lazy"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'Ted',
            'provider_url' => 'https://ted.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
