<?php
/**
 * KirimEmail.php
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
 * KirimEmail Provider
 * Dapatkan lebih banyak traffic dan penjualan untuk bisnis Anda dengan layanan email marketing, a...
 *
 * @link https://kirim.email
 *
 */
class KirimEmail extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://halaman.email/service/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.kirim.email', '*.halaman.email'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(kirim|halaman)\.email/form/([^/]+)~i', (string) $url));
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
        $embedUrl = str_replace('/form/', '/oembed/', $this->url);

        $attr = [];
        $attr[] = 'style="width:100%!important;height=640px;"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'KirimEmail',
            'provider_url' => 'https://kirim.email',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
