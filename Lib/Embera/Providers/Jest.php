<?php
/**
 * Jest.php
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
 * The Jest.com Provider
 * @link http://jest.com
 */
class Jest extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.jest.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~jest\.com/(?:video|embed)/(?:[0-9]{4,10})/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/(?:video|embed)/([0-9]{4,10})/?~i', $this->url, $matches);

        $vId = $matches['1'];
        $html = '<object id="jest' . $vId. '" type="application/x-shockwave-flash" data="http://1.static.jest.cvcdn.com/moogaloop/moogaloop.internal.1.0.23.swf?fullscreen=1&amp;clip_id=' . $vId . '&amp;use_node_id=true" width="{width}" height="{height}">';
        $html .= '<param name="allowfullscreen" value="true"/><param name="wmode" value="transparent"/><param name="allowScriptAccess" value="always"/>';
        $html .= '<param name="movie" quality="best" value="http://1.static.jest.cvcdn.com/moogaloop/moogaloop.internal.1.0.23.swf?fullscreen=1&amp;clip_id=' . $vId . '&amp;use_node_id=true"/>';
        $html .= '<embed src="http://1.static.jest.cvcdn.com/moogaloop/moogaloop.internal.1.0.23.swf?fullscreen=1&amp;clip_id=' . $vId . '&amp;use_node_id=true" type="application/x-shockwave-flash" wmode="transparent" width="{width}" height="{height}" allowScriptAccess="always">';
        $html .= '</embed></object>';

        return array(
            'type' => 'video',
            'provider_name' => 'Jest',
            'provider_url' => 'http://www.jest.com',
            'html' => $html,
        );
    }
}

?>
