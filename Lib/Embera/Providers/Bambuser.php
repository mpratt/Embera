<?php
/**
 * Bambuser.php
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
 * The bambuser.com Provider
 * @link http://bambuser.com
 * @link http://bambuser.com/api/embed_oembed
 */
class Bambuser extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.bambuser.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        return (
            preg_match('~bambuser\.com/v/(?:[0-9]+)$~i', $this->url) || preg_match('~bambuser\.com/channel/(?:[^/]+)$~i', $this->url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl()
    {
        if (preg_match('~bambuser\.com/channel/(?:[^/]+)/broadcast/([0-9]+)~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://bambuser.com/v/' . $matches['1']);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $defaults = array(
            'type' => 'video',
            'provider_name' => 'Bambuser.com',
            'provider_url' => 'http://bambuser.com',
        );

        $html  = '<object id="bplayer" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}">';
        $html .= '<embed  allowfullscreen="true" allowscriptaccess="always" wmode="transparent" type="application/x-shockwave-flash" name="bplayer" src="https://static.bambuser.com/r/player.swf?{query}&amp;context=oembed" width="{width}" height="{height}" />';
        $html .= '<param name="movie" value="https://static.bambuser.com/r/player.swf?context=oembed&amp;{query}" />';
        $html .= '<param name="allowfullscreen" value="true" />';
        $html .= '<param name="allowscriptaccess" value="always" />';
        $html .= '<param name="wmode" value="transparent" />';
        $html .= '</object>';

        if (preg_match('~/v/([0-9]+)$~i', $this->url, $matches)) {
            return array_merge(
                $defaults,
                array('html' => str_replace('{query}', 'vid=' . $matches['1'], $html))
            );
        }
        else if (preg_match('~/channel/([^/]+)~i', $this->url, $matches))
        {
            return array_merge(
                $defaults,
                array('html' => str_replace('{query}', 'username=' . urlencode($matches['1']), $html))
            );
        }

        return array();
    }

}

?>
