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
        $html = "<iframe src='" . $this->url . "' width='{width}' height='{height}' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";

        return array(
            'type' => 'video',
            'provider_name' => 'Verse',
            'provider_url' => 'http://verse.media',
            'html' => $html,
        );
    }
}

?>
