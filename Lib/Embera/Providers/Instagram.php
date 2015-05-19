<?php
/**
 * Instagram.php
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
 * The instragram.com Provider
 * @link https://instagram.com
 */
class Instagram extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.instagram.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        return (preg_match('~/p/([\w\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']) && !empty($response['url'])) {
            $extension = strtolower(pathinfo(parse_url($response['url'],PHP_URL_PATH),PATHINFO_EXTENSION));
            if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                $html  = '<a href="' . $response['url'] . '" target="_blank">';
                $html .= '<img class="instagram-oembed" src="' . $response['url'] . '" width="' . $response['width'] . '" height="' . $response['height'] . '" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
                $html .= '</a>';
                $response['html'] = $html;
            }
        }

        return $response;
    }
}

?>
