<?php
/**
 * Smugmug.php
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
 * Smugmug Provider
 * @link https://*.smugmug.com
 * @link https://api.smugmug.com/services/oembed
 */
class Smugmug extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.smugmug.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.smugmug.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~smugmug\.com/([^/]+)/([^/]+)/([^/]+)$~i', (string) $url));
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
        if (empty($response['html']) && $response['type'] == 'photo') {
            $html = [];
            $html[] = '<div class="smugmug-html">';
            $html[] = '<a href="' . $response['gallery_url'] . '" title="">';
            $html[] = '<img src="' . $response['url'] . '" alt=""" title="">';
            $html[] = '</a>';
            $html[] = '</div>';

            $response['html'] = implode('', $html);
        }

        return $response;
    }

}
