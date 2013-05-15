<?php
/**
 * Yotube.php
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
    protected $apiUrl = 'http://www.youtube.com/oembed?format=json';
    protected $query = array();

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        $parsed = parse_url($this->url);
        if (!empty($parsed['query']))
        {
            parse_str($parsed['query'], $this->query);
            return (!empty($this->query['v']));
        }

        return false;
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~(?:v=|youtu\.be/)([a-z0-9_-]+)~i', $this->url, $matches))
            $this->url = 'http://www.youtube.com/watch?v=' . $matches[1];
    }

    /**
     * This method fakes an Oembed response.
     * Is used when an Oembed request fails or is disabled.
     *
     * @return array
     */
    public function fakeResponse()
    {
        $url = 'http://www.youtube.com/embed/' . $this->query['v'];
        $html = '<iframe width="' . $this->getWidth() . '" height="' . $this->getHeight() . '" src="' . $url . '" frameborder="0" allowfullscreen>';
        $html .= '</iframe>';

        $data = array('type' => 'video',
                      'provider_name' => 'Youtube',
                      'provider_url' => 'http://www.youtube.com',
                      'title' => 'Unknown title',
                      'html' => $html);

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
