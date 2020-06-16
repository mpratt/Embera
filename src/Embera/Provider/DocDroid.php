<?php
/**
 * DocDroid.php
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
 * DocDroid Provider
 * @link https://docdroid.net
 */
class DocDroid extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://docdroid.net/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'docdroid.net', 'docdro.id', 'docdroid.com',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~docdroid\.(net|com)/([^/]+)/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->removeLastSlash();
        if (preg_match('~docdro\.id/([^/]+)$~i', (string) $url, $m)) {
            $url->overwrite('https://docdroid.net/' . $m['1'] . '/sample.pdf');
        }

        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }


    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = (string) $this->url;

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowtransparency';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'DocDroid',
            'provider_url' => 'http://docdroid.net',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
