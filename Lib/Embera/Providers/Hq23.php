<?php
/**
 * Hq23.php
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
 * The 23hq.com Provider
 * @link http://23hq.com
 */
class Hq23 extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.23hq.com/23/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~23hq\.com/(?:[^/]+)/photo/(?:[0-9]+)/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
        {
            $html  = '<a href="' . $response['url'] . '" target="_blank">';
            $html .= '<img class="23hq-oembed" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
            $html .= '</a>';

            $response['html'] = $html;
        }

        return $response;
    }
}

?>
