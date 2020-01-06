<?php
/**
 * ScribbleMaps.php
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
 * ScribbleMaps Provider
 * @link https://scribblemaps.com
 */
class ScribbleMaps extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.scribblemaps.com/api/services/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'scribblemaps.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~scribblemaps\.com/maps/view/([^/]+)~i', (string) $url));
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
    public function modifyResponse(array $response = [])
    {
        if (!empty($response['html'])) {
            $response['html'] = preg_replace('~title="(.+)"~i', 'title=""', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        // https://www.scribblemaps.com/maps/view/Road_to_Civil_War_Ethan_Culotta/ZIf2eLM_hn
        // <iframe src="ZIf2eLM_hn" width="720" height="550" style="max-width: 100%;" frameborder="0" title="Road to Civil War Ethan Culotta" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="geolocation"></iframe>
         preg_match('~/([^/]+)$~', (string) $this->url, $matches);

        $embedUrl = '//widgets.scribblemaps.com/sm/?d&z&l&id=' . $matches['1'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'style="max-width: 100%"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'title=""';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';
        $attr[] = 'allow="geolocation"';

        return [
            'type' => 'rich',
            'provider_name' => 'ScribbleMaps',
            'provider_url' => 'https://scribblemaps.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
