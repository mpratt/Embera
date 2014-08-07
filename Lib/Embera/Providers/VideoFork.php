<?php
/**
 * VideoFork.php
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
 * The videofork.com Provider
 */
class VideoFork extends \Embera\Adapters\Service
{
    /**
     * inline {@inheritdoc}
     *
     * This services doesnt have one single endpoint, but instead
     * every video has its own oembed url based on the id of the
     * video.
     */
    protected $apiUrl = 'http://videofork.com/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~videofork\.com/(?:play|oembed)/(?:[0-9]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/(?:play|oembed)/([0-9]+)~i', $this->url, $matches)) {
            // Overwrite the oembed endpoint with a valid one
            $this->apiUrl = 'http://videofork.com/oembed/' . $matches['1'];
            $this->url = new \Embera\Url('http://videofork.com/play/' . $matches['1']);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = str_replace('/play/', '/embed/', $this->url);

        return array(
            'type' => 'video',
            'provider_name' => 'VideoFork',
            'provider_url' => 'http://videofork.com',
            'html' => '<object width="{width}" height="{height}"> <param name="movie" value="' . $url . '"></param> <param name="allowFullScreen" value="true"></param> <param name="allowscriptaccess" value="always"></param> <embed src="' . $url . '" type="application/x-shockwave-flash" width="{width}" height="{height}" allowscriptaccess="always" allowfullscreen="true"></embed> </object>',
        );
    }
}

?>
