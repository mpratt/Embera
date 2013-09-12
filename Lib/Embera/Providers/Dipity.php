<?php
/**
 * Dipity.php
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
 * The dipity.com Provider
 * @link http://www.dipity.com
 */
class Dipity extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.dipity.com/oembed/timeline/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~dipity\.com/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $this->url->stripLastSlash();
        $title = preg_replace('~^(.*)/~', '', $this->url);
        $title = str_replace('-', ' ', $title);

        $html  = '<div class="dipity_embed" style="width:{width}px; margin:0; padding:0;">';
        $html .= '<iframe width="{width}" height="{height}" src="' . (string) $this->url . '/?mode=embed&skin=true_mono&z=0#tl" style="border:1px solid #CCC;"></iframe>';
        $html .= '<p style="margin:0;font-family:Arial,sans;font-size:13px;text-align:center"><a href="' . (string) $this->url . '/">' . $title . '</a> on <a href="http://www.dipity.com/">Dipity</a>.</p>';
        $html .= '</div>';

        return array(
            'type' => 'rich',
            'provider_name' => 'Dipity',
            'provider_url' => 'http://www.dipity.com',
            'html' => $html,
        );
    }
}

?>
