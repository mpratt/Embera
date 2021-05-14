<?php
/**
 * Gyazo.php
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
 * Gyazo Provider
 * No description.
 *
 * @link https://gyazo.com
 * @see https://gyazo.com/api/docs/image#oembed
 */
class Gyazo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.gyazo.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'gyazo.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~gyazo\.com/([^/]{32,40})$~i', (string) $url));
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
        if (empty($response['html']) && !empty($response['url'])) {
            $response['html'] = '<img class="gyazo-oembed" src="' . $response['url'] . '" width="100%" style="width:100%;height:auto;" alt="" title="" >';
        }

        return $response;
    }

}
