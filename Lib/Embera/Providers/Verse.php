<?php
/**
 * Verse.php
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
 * The Verse Media Provider
 * @link https://verse.media
 */
class Verse extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://verse.media/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->stripQueryString();
        return (preg_match('~verse\.media/stories/(?:[^ ]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $html  = '<div class="verse-player-embed">';
        $html .= '<style>.verse-player-embed {position: relative; padding-bottom: calc(56.25% + 55px); height: 0; overflow: hidden; max-width: 100%; } .verse-player-embed iframe, .verse-player-embed object, .verse-player-embed embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>';
        $html .= '<iframe src="' . $this->url . '" frameborder="0" allowfullscreen ></iframe>';
        $html .= '</div>';

        return array(
            'type' => 'video',
            'provider_name' => 'Verse',
            'provider_url' => 'http://verse.media',
            'html' => $html,
        );
    }
}

?>
