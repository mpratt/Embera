<?php
/**
 * MedienArchivKuenste.php
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
 * MedienArchivKuenste Provider
 * @link https://medienarchiv.zhdk.ch
 */
class MedienArchivKuenste extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://medienarchiv.zhdk.ch/oembed.json?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'medienarchiv.zhdk.ch'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~medienarchiv\.zhdk\.ch/entries/([^/]+)$~i', (string) $url));
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
        $embedUrl = $this->url . '/embedded?height={height}&width={width}';

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'style="margin:0;padding:0;border:0"';
        $attr[] = 'allowfullscreen webkitallowfullscreen mozallowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'MedienArchivKuenste',
            'provider_url' => 'https://medienarchiv.zhdk.ch',
            'title' => 'Unknown title',
            'html' => '<div class="___madek-embed"><iframe ' . implode(' ', $attr). '></iframe></div>',
        ];
    }

}
