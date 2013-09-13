<?php
/**
 * MyOpera.php
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
 * The my.opera.com Provider
 * @link http://my.opera.com
 */
class MyOpera extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://my.opera.com/service/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        // TODO: Strip noise from the querystring
        return (preg_match('~my\.opera\.com/([^/]+)/(avatar\.pl|(albums/(show|showpic)\.dml\?(id|album)=))~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
        {
            if (strtolower($response['type']) == 'photo')
            {
                $html  = '<a href="' . $response['url'] . '" target="_blank">';
                $html .= '<img class="myopera-oembed" src="' . $response['url'] . '" width="80" height="80" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
                $html .= '</a>';

                $response['html'] = $html;
            }
        }

        return $response;
    }
}

?>
