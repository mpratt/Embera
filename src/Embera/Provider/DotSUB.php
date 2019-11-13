<?php
/**
 * DotSUB.php
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
 * DotSUB Provider
 * @link
 */
class DotSUB extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://dotsub.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'dotsub.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'language' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~dotsub\.com/view/(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        if (preg_match('~/media/([^/]+)$~i', $url, $matches)) {
            $url->overwrite(str_replace('/media/', '/view/', (string) $url));
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/view/', '/media/', $this->url) . '/e/c/width={width}&height={height}';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';

        return [
            'type' => 'video',
            'provider_name' => 'DotSUB',
            'provider_url' => 'http://dotsub.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
