<?php
/**
 * Sketchfab.php
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
 * The sketchfab.com Provider
 * @link http://sketchfab.com
 */
class Sketchfab extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://sketchfab.com/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (
            preg_match('~sketchfab\.com/models/(?:[^/]+)$~i', $this->url) ||
            preg_match('~sketchfab\.com/(?:[^/]+)/folders/(?:[^/]+)$~i', $this->url)
        );
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripWWW();
        $this->url->convertToHttps();

        // old urls
        if (preg_match('~sketchfab\.com/show/([^/]+)/?$~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('https://sketchfab.com/models/' . $matches[1]);
        } else if (preg_match('~(/embed/?)$~', $this->url)) {
            $this->url = new \Embera\Url(preg_replace('~(/embed/?)$~', '', $this->url));
        }
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html'])) {
            $response['html'] = preg_replace('~<p(.*)>(.*)</p>~is', '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        if (preg_match('~sketchfab\.com/(?:[^/]+)/folders/([^/]+)$~i', $this->url, $m)) {
            $url = 'https://sketchfab.com/playlists/embed?folder=' . $m['1'];
        } else {
            $url = str_replace('/show/', '/embed/', $this->url) . '/embed';
        }

        return array(
            'type' => 'rich',
            'provider_name' => 'Sketchfab',
            'provider_url' => 'http://sketchfab.com',
            'html' => '<iframe width="{width}" height="{height}" src="' . $url . '" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>'
        );
    }
}

?>
