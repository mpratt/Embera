<?php
/**
 * AmCharts.php
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
 * AmCharts Provider
 * AmCharts live editor: create, configure, tweak, edit data, export, import, save,
 * share in a single interface, the user-friendly way.
 *
 * @link https://live.amcharts.com/
 *
 */
class AmCharts extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://live.amcharts.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'live.amcharts.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        // discard this matches
        if (preg_match('~amcharts\.com/new~i', (string) $url)) {
            return false;
        }

        return (bool) (preg_match('~amcharts\.com/([^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~amcharts\.com/([^/]+)/edit/?~i', $url, $matches)) {
            $url->overwrite('https://live.amcharts.com/' . $matches['1']);
        }

        $url->convertToHttps();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~amcharts\.com/([^/]+)~i', $this->url, $matches);
        $embedUrl = 'https://live.amcharts.com/' . $matches['1'];

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0" ';

        return [
            'type' => 'rich',
            'provider_name' => 'amCharts',
            'provider_url' => 'https://www.amcharts.com/',
            'title' => 'Unknown title',
            'thumbnail_url' => 'http://generated.amcharts.com/' . substr($matches['1'], 0, 2) . '/' . $matches['1'] . '-full.png',
            'canonical' => $embedUrl . '/',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
