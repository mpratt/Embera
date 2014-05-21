<?php
/**
 * Clyp.php
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
 * The clyp.it Provider
 *
 * TODO: Its fairly easy to allow fake responses for single urls
 * but is not that simple when using playlists, since the playlist
 * oembed response only embeds the first audio
 *
 * A sample Implementation is commented out, because the current way
 * provider tests are made does not allow selective urls, and this provider
 * is eventually going to fail when a playlist url is given.
 */
class Clyp extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.clyp.it/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        return (preg_match('~clyp\.it/([^ ]{8,12}|playlist/[^ ]{8,12})$~i', $this->url));
    }

    /** inline {@inheritdoc}
    public function fakeResponse()
    {
        if (preg_match('~/playlist/~i', $this->url) {
            return array();
        }

        return array(
            'type' => 'rich',
            'provider_name' => 'Clyp',
            'provider_url' => 'http://clyp.it',
            'title' => 'Unknown title',
            'html' => '<iframe width="{width}" height="{height}" src="http://clyp.it/' . basename($this->url) . '/widget" frameborder="0"></iframe>',
        );
    }
    */
}

?>
