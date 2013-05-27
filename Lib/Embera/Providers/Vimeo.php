<?php
/**
 * Vimeo.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Vimeo extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://vimeo.com/api/oembed.json';
    protected $videoId = null;

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~vimeo\.com/(?:[\d]{5,12})$~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/([\d]{5,12})/?$~i', $this->url, $matches))
        {
            $this->videoId = $matches[1];
            $this->url = 'http://vimeo.com/' . $this->videoId;
        }
    }

    /**
     * This method fakes an Oembed response.
     * Is used when an Oembed request fails or is disabled.
     *
     * @return array
     */
    public function fakeResponse()
    {
        if (is_null($this->videoId))
            return array();

        $html = '<iframe src="{video}" width="{width}" height="{height}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        $t = array(
            '{video}' => 'http://player.vimeo.com/' . $this->videoId,
            '{width}' => $this->getWidth(),
            '{height}' => $this->getHeight()
        );

        $data = array(
            'type' => 'video',
            'provider_name' => 'Vimeo',
            'provider_url' => 'http://www.vimeo.com',
            'title' => 'Unknown title',
            'html' => str_replace(array_keys($t), array_values($t), $html)
        );

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
