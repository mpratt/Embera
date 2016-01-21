<?php
/**
 * Sway.php
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
 * The sway.com Provider
 * @link https://sway.com
 */
class Sway extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://sway.com/api/v1.0/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();

        return (preg_match('~sway\.com/([^ /]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url  = 'https://sway.com/s/' . trim(str_replace('https://sway.com/', '', $this->url), ' /') . '/embed';
        $html = '<iframe width="{width}" height="{height}" src="' . $url . '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen></iframe>';

        return array(
            'type' => 'rich',
            'provider_name' => 'Sway.co',
            'provider_url' => 'https://sway.com',
            'html' => $html,
        );
    }
}

?>
