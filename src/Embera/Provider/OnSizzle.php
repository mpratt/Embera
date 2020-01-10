<?php
/**
 * Onsizzle.php
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
 * Onsizzle Provider
 * @link https://onsizzle.com
 */
class OnSizzle extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://onsizzle.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'onsizzle.com', 'me.me'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(me\.me|onsizzle\.com)/i/(?:[^/]+)~i', (string) $url));
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
            $response['html'] = preg_replace('~<p>(.+)</p>~i', '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/i/', '/embed/i/', $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameBorder="0"';
        $attr[] = 'class="sizzle-embed"';
        $attr[] = 'style="max-width:100%"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Onsizzle',
            'provider_url' => 'https://onsizzle.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
