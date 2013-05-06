<?php
/**
 * Yotube.php
 * Youtube Oembed Service
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Youtube extends \Embera\Adapters\Service
{
    protected $oEmbedUrl = 'http://www.youtube.com/oembed?url={url}&format={format}&maxheight={height}&maxwidth={width}';

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        if (!empty($this->url->query))
        {
            $query = array();
            parse_str($this->url->query, $query);
            if (!isset($query['v']))
                return false;

            $this->url->query = 'v=' . $query['v'] . (isset($query['list']) ? '&list=' . $query['list'] : '');
            return true;
        }

        return false;
    }

    /**
     * This method fakes an Oembed response.
     * Is used when an Oembed request fails or disabled.
     *
     * @return array
     */
    public function fakeOembedResponse()
    {
        $url = 'http://www.youtube.com/embed/' . str_replace(array('v=', '&list='), array('', '?list='), $this->url->query);
        $html = '<iframe width="{width}" height="{height}" src="' . $url . '?feature=oembed" frameborder="0" allowfullscreen></iframe>';
        return array('type' => 'video',
                     'provider_name' => 'Youtube',
                     'provider_url' => 'http://www.youtube.com',
                     'html' => $html);
    }
}

?>
