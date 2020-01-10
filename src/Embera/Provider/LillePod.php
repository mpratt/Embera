<?php
/**
 * LillePod.php
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
 * LillePod Provider
 * @link https://pod.univ-lille.fr
 */
class LillePod extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://pod.univ-lille.fr/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'pod.univ-lille.fr'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~pod\.univ-lille\.fr/video/([^/]+)/$~i', (string) $url));
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
        $embedUrl = $this->url . '?is_iframe=true';
        // <iframe src="https://pod.univ-lille.fr/video/0001-clip-pod/?is_iframe=true" width="640" height="360" style="" allowfullscreen ></iframe>

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'style="padding: 0; margin: 0; border:0"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'LillePod',
            'provider_url' => 'https://pod.univ-lille.fr',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
