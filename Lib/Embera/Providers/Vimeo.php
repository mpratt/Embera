<?php
/**
 * Vimeo.php
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
 * The Vimeo.com Provider
 */
class Vimeo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://vimeo.com/api/oembed.json';

    /** @var int The Id of the current video, based on the url */
    protected $videoId = null;

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~vimeo\.com/(?:[0-9]{5,12})$~i', $this->url));
    }

    /**
     * inline {@inheritdoc}
     * This method tries to extract the video Id based
     * on the current url and stores it into $this->videoId
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/([0-9]{5,12})/?$~i', $this->url, $matches))
        {
            $this->videoId = $matches[1];
            $this->url = new \Embera\Url('http://vimeo.com/' . $this->videoId);
        }
    }

    /** inline {@inheritdoc} */
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
