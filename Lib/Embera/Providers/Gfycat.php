<?php
/**
 * Gfycat.php
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
 * The Gfycat Provider
 * @link https://gfycat.com
 */
class Gfycat extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = '';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        $banned = array('api', 'terms', 'privacy', 'about', 'dmca', 'search');
        $this->url->invalidPattern('(gfycat\.com/(' . implode('|', $banned) . ')$)');

        return (preg_match('~gfycat\.com/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = preg_replace('~gfycat\.com/~i', 'gfycat.com/ifr/', $this->url);

        return array(
            'type' => 'video',
            'provider_name' => 'Gfycat',
            'provider_url' => 'https://gfycat.com',
            'html' => '<iframe src="' . $url . '" frameborder="0" scrolling="no" width="{width}" height="{height}" style="-webkit-backface-visibility: hidden;-webkit-transform: scale(1);" ></iframe>'
        );
    }
}

?>
