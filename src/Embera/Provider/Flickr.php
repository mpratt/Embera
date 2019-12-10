<?php
/**
 * Flickr.php
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
 * Flickr Provider
 * @link https://flickr.com
 */
class Flickr extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.flickr.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'flickr.com', 'flic.kr'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~/photos/(?:[^/]+)/(?:[0-9]+)/?~i', (string) $url) ||
            preg_match('~flic\.kr/p/(?:[^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~/photos/([^/]+)/([^/]+)/?~i', (string) $url, $m)) {
            $url->overwrite('https://www.flickr.com/photos/' . $m['1'] . '/' . $m['2'] . '/');
        }

        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
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
        $html []= '<img class="flickr" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="" title="" >';
        $html[] = '</a>';

        $response['html_alternative'] = implode('', $html);

        return $response;
    }

}
