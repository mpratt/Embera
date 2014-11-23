<?php
/**
 * Spotify.php
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
 * The spotify.com Provider
 */
class Spotify extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://embed.spotify.com/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (
            preg_match('~spotify\.com/(?:track|album)/(?:[^/]+)(?:/[^/]*)?$~i', $this->url) ||
            preg_match('~spotify\.com/user/(?:[^/]+)/playlist/(?:[^/]+)/?$~i', $this->url) ||
            preg_match('~spoti\.fi/(?:[^/]+)$~i', $this->url)
        );
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->convertToHttps();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        if (preg_match('~spotify\.com/(track|album)/([^/]+)/(?:[^/]*)$~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('https://play.spotify.com/' . $matches['1'] . '/' . $matches['2']);
        }

    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        if (preg_match('~spoti\.fi~i', $this->url)) {
            return array();
        }

        preg_match('~/(track|album|user)/.+~i', $this->url, $matches);
        $code = str_replace('/', ':', rtrim($matches['0'], '/ '));

        return array(
            'type' => 'rich',
            'provider_name' => 'Spotify',
            'provider_url' => 'https://www.spotify.com',
            'title' => 'Unknown title',
            'html' => '<iframe src="https://embed.spotify.com/?uri=spotify' . $code . '" width="{width}" height="{height}" frameborder="0" allowtransparency="true"></iframe>',
        );
    }
}

?>
