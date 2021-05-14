<?php
/**
 * Deviantart.php
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
 * Deviantart Provider
 * DeviantArt is where art and community thrive.
 * Explore over 350 million pieces of art while connecting
 * to fellow artists and art enthusiasts.
 *
 * @link https://deviantart.com
 * @see https://www.deviantart.com/developers/oembed
 */
class Deviantart extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://backend.deviantart.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.deviantart.com', 'fav.me', 'sta.sh',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(deviantart\.com/(?:(?:[^/]+)/)?art/(?:[^/]+)|(?:sta\.sh|fav\.me)/([^/]+))/?$~i', (string) $url));
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
        if (!empty($response) && empty($response['html']) && strtolower($response['type']) == 'photo') {
            $html = [];
            $html[] = '<a href="' . $response['url'] . '" target="_blank">';
            $html[] = '<img src="' . $response['thumbnail_url_200h'] . '" width="' . $response['thumbnail_width_200h'] . '" height="' . $response['thumbnail_height_200h'] . '" alt="" title="" .>';
            $html[] = '</a>';

            $response['html'] = implode('', $html);
        }

        return $response;
    }

}
