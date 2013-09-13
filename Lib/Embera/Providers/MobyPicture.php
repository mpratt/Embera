<?php
/**
 * MobyPicture.php
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
 * The mobypicture.com Provider
 * @link http://mobypicture.com
 */
class MobyPicture extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.mobypicture.com/oEmbed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~mobypicture\.com/user/(?:[^/]+)/view/(?:[0-9]+)/?$~i', $this->url) ||
                preg_match('~moby\.to/(?:[\w\d]+)$~', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
        {
            if (strtolower($response['type']) == 'photo')
            {
                $html  = '<a href="' . $response['url'] . '" target="_blank">';
                $html .= '<img class="mobypicture-oembed" src="' . $response['url'] . '" width="200" height="200" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
                $html .= '</a>';

                $response['html'] = $html;
            }
        }

        return $response;
    }
}

?>
