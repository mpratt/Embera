<?php
/**
 * Codepoints.php
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
 * Codepoints Provider
 * Codepoints.net is dedicated to all the characters, that are defined in
 * the Unicode Standard. Theoretically, these should be all characters ever
 * used.
 *
 * @link https://codepoints.net
 */
class Codepoints extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://codepoints.net/api/v1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'codepoints.net'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~codepoints\.net/U\+(?:[^/]+)$~i', (string) $url));
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
        // The oembed html response returns http:// but it is capable of handling https://
        if (!empty($response['html'])) {
            $response['html'] = str_ireplace('http://', 'https://', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~/U\+([^/]+)$~i', $this->url, $m);

        $embedUrl = $this->url . '?embed';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="width: 64px; height: 640px; border: 1px solid #444;"';

        return [
            'type' => 'rich',
            'provider_name' => 'Codepoints.net',
            'provider_url' => 'http://codepoints.net/',
            'thumbnail_url' => 'http://codepoints.net/api/v1/glyph/' . $m['1'],
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
