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
        $this->url->stripWWW();
        $this->url->stripLastSlash();

        return (preg_match('~sketchfab\.com/show/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = str_replace('/show/', '/embed/', $this->url);

        return array(
            'type' => 'rich',
            'provider_name' => 'Sketchfab',
            'provider_url' => 'http://sketchfab.com',
            'html' => '<iframe frameborder="0" width="{width}" height="{height}" webkitallowfullscreen="true" mozallowfullscreen="true" src="' . $url . '?autostart=0&amp;transparent=0&amp;autospin=0&amp;controls=1&amp;watermark=0"></iframe>',
        );
    }
}

?>
