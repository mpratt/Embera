<?php
/**
 * Zingsoft.php
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
 * Zingsoft Provider
 * Log in or Sign up to receive access to purchasing, custom web IDE, premium demos and support fo...
 *
 * @link https://app.zingsoft.com
 *
 */
class Zingsoft extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.zingsoft.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.zingsoft.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~zingsoft\.com/([^/]+)/(embed|view)/([^/]+)~i', (string) $url));
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
            $response['html'] = trim(preg_replace('~\s+~', ' ', preg_replace('~\n~i', ' ', $response['html'])));
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $attr = [];
        $attr[] = 'allowtransparency="true"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $this->url . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Zingsoft',
            'provider_url' => 'https://*.zingsoft',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
