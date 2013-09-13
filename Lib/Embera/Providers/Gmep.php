<?php
/**
 * Gmep.php
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
 * The gmep.org Provider
 * @link http://gmep.org
 */
class Gmep extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://gmep.org/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();
        $this->url->stripWWW();

        return (preg_match('~gmep\.org/media/(?:[0-9]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']) && $response['type'] =='photo')
        {
            $html  = '<a href="' . $response['url'] . '" target="_blank">';
            $html .= '<img class="gmep-oembed" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
            $html .= '</a>';

            $response['html'] = $html;
        }

        return $response;
    }
}

?>
