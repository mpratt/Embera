<?php
/**
 * GeographUk.php
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
 * GeographUk Provider
 * Geograph Britain and Ireland is a web-based project to collect and reference geographically rep...
 *
 * @link https://www.geograph.org.uk/
 *
 */
class GeographUk extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.geograph.org.uk/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.geograph.org.uk', '*.geograph.co.uk', '*.geograph.ie'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~/(photo|geophotos)/([^/]+)~i', (string) $url));
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
            return $response;
        }

        $check = [
            'url', 'thumbnail_url', 'thumbnail_width', 'thumbnail_height', 'title'
        ];

        foreach ($check as $c) {
            if (!isset($response[$c])) {
                return $response;
            }
        }

        $html = [];
        $html[] = '<a href="' . $response['url'] . '" target="_blank">';
        $html[] = '<img class="geograph" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="" title="" >';
        $html[] = '</a>';

        $response['html'] = implode('', $html);

        return $response;
    }

}
