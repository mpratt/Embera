<?php
/**
 * Deviantart.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The deviantart.com Provider
 * @link http://deviantart.com
 * @link http://www.deviantart.com/developers/oembed
 */
class Deviantart extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://backend.deviantart.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~(deviantart\.com/art/(?:[^/]+)|(?:sta\.sh|fav\.me)/([^/]+))/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
        {
            if (strtolower($response['type']) == 'photo')
            {
                $html  = '<a href="' . $response['url'] . '" target="_blank">';
                $html .= '<img class="deviantart-oembed" src="' . $response['thumbnail_url_200h'] . '" width="' . $response['thumbnail_width_200h'] . '" height="' . $response['thumbnail_height_200h'] . '" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
                $html .= '</a>';

                $response['html'] = $html;
            }
        }

        return $response;
    }
}

?>
