<?php
/**
 * Flickr.php
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
 * The Flickr.com Provider
 * @link http://www.flickr.com
 */
class Flickr extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.flickr.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/photos/(?:[^/]+)/(?:[0-9]+)/?~i', $this->url) || preg_match('~flic\.kr/p/(?:[^/]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/photos/([^/"\'<>]+)/([0-9]+)/?~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://www.flickr.com/photos/' . $matches['1'] . '/' . $matches['2'] . '/');
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
        {
            $html  = '<a href="' . $response['url'] . '" target="_blank">';
            $html .= '<img class="flickr-oembed" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '">';
            $html .= '</a>';

            $response['html'] = $html;
        }

        return $response;
    }
}

?>
