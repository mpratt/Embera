<?php
/**
 * Archivos.php
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
 * Archivos Provider
 * @link https://www.archivos.digital
 */
class Archivos extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.archivos.digital/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.archivos.digital'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~archivos\.digital/app/view/([^/]+)/?(web|map|timeline/([\d]+))?$~i', (string) $url));
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
        $embedUrl = (string) $this->url . '?embed&visibility=public';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Archivos',
            'provider_url' => 'https://app.archivos.digital/',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). ' ></iframe>',
        ];
    }

}
