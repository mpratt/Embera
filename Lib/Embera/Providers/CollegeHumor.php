<?php
/**
 * CollegeHumor.php
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
 * The CollegeHumor.com Provider
 * @link http://www.collegehumor.com/
 */
class CollegeHumor extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.collegehumor.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~collegehumor\.com/(?:video|embed)/(?:[0-9]{5,10})/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
        {
            $spam = array('~<p>(?:.*)</p>~i', '~<div (?:.*)</div>~i');
            $response['html'] = preg_replace($spam, '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        if (preg_match('~/(?:video|embed)/([0-9]{5,10})/?~i', $this->url, $matches))
        {
            $vId = $matches['1'];
            $html = '<object id="ch' . $vId. '" type="application/x-shockwave-flash" data="http://0.static.collegehumor.cvcdn.com/moogaloop/moogaloop.1.0.36.swf?clip_id=' . $vId . '&amp;use_node_id=true&amp;fullscreen=1" width="{width}" height="{height}">';
            $html .= '<param name="allowfullscreen" value="true"/><param name="wmode" value="transparent"/><param name="allowScriptAccess" value="always"/>';
            $html .= '<param name="movie" quality="best" value="http://0.static.collegehumor.cvcdn.com/moogaloop/moogaloop.1.0.36.swf?clip_id=' . $vId . '&amp;use_node_id=true&amp;fullscreen=1"/>';
            $html .= '<embed src="http://0.static.collegehumor.cvcdn.com/moogaloop/moogaloop.1.0.36.swf?clip_id=' . $vId . '&amp;use_node_id=true&amp;fullscreen=1" type="application/x-shockwave-flash" wmode="transparent" width="{width}" height="{height}" allowScriptAccess="always">';
            $html .= '</embed></object>';

            return array(
                'type' => 'video',
                'provider_name' => 'CollegeHumor',
                'provider_url' => 'http://www.collegehumor.com',
                'html' => $html,
            );
        }

        return array();
    }
}

?>
