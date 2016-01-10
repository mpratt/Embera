<?php
/**
 * Silk.php
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
 * The silk.co Provider
 * @link https://silk.co
 */
class Silk extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.silk.co/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        return (preg_match('~silk\.co/(?:explore|s/embed)/(?:[^ ]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = preg_replace('~^https?://~i', '//', $this->url);
        $url = preg_replace('~\.silk\.co/(?:explore)/~i', '.silk.co/s/embed/', $url);

        $html = '<div style="display: inline-block; width: 100%; min-height: {height}px;">';
        $html .= '<div style="position: relative; padding-bottom: 100%; padding-top:25px; height: 0;">';
        $html .= '<iframe src="' . $url . '?oembed=" style="border:0;position: absolute; top:0; left:0; width: 100%;height:100%; min-height: {height}px;"></iframe>';
        $html .= '</div></div>';

        return array(
            'type' => 'rich',
            'provider_name' => 'Silk.co',
            'provider_url' => 'https://silk.co',
            'html' => $html,
        );
    }
}

?>
