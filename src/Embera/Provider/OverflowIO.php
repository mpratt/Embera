<?php
/**
 * OverflowIO.php
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
 * OverflowIO Provider
 * @link https://overflow.io
 */
class OverflowIO extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://overflow.io/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'overflow.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~overflow\.io/s/([^/]+)$~i', (string) $url));
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
        /* <iframe width="600" height="800" src="https://overflow.io/embed/9ST7SX" scrolling="no" allowfullscreen style="border: 1px solid #E9EAEC; border-radius: 4px;"></iframe> */
        $embedUrl = str_replace('/s/', '/embed/', $this->url);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'allowfullscreen';
        $attr[] = 'style="border: 1px solid #E9EAEC; border-radius: 4px;"';

        return [
            'type' => 'rich',
            'provider_name' => 'OverflowIO',
            'provider_url' => 'https://overflow.io',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
