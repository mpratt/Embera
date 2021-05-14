<?php
/**
 * ChartBlocks.php
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
 * ChartBlocks Provider
 * The world's easiest chart builder app. Design and share a chart in minutes.
 *
 * @link https://www.chartblocks.com
 *
 */
class ChartBlocks extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://embed.chartblocks.com/1.0/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'public.chartblocks.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~chartblocks\.com/c/([^/]+)/?~i', (string) $url));
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
        preg_match('~chartblocks\.com/c/([0-9A-z]+)~i', (string) $this->url, $m);

        $embedUrl = '//embed.chartblocks.com/1.0/?c=' . $m['1'] . '';

        $attr = [];
        $attr[] = 'class="chartblocks-embed"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'ChartBlocks',
            'provider_url' => 'https://chartblocks.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
