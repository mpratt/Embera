<?php
/**
 * Tvcf.php
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
 * Tvcf Provider
 * No description.
 *
 * @link https://tvcf.co.kr
 *
 */
class Tvcf extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://play.tvcf.co.kr/rest/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.tvcf.co.kr'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~tvcf\.co\.kr/([0-9]+)$~i', (string) $url));
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
        preg_match('~tvcf\.co\.kr/([0-9]+)$~i', (string) $this->url, $m);
        $embedUrl = 'https://play.tvcf.co.kr/embed/' . $m['1'];

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'Tvcf',
            'provider_url' => 'https://*.tvcf.co.kr',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
