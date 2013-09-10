<?php
/**
 * Viddler.php
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
 * The Viddler.com Provider
 */
class Viddler extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.viddler.com/oembed/?format=json';

    /** @var string The Id of the current video, based on the url */
    protected $videoId = null;

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~viddler\.com/(?:v|embed)/(?:[0-9a-f]{7,12})/?$~i', $this->url));
    }

    /**
     * inline {@inheritdoc}
     * This method tries to extract the video Id based
     * on the current url and stores it into $this->videoId
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/(?:v|embed)/([0-9a-f]{7,12})/?~i', $this->url, $matches))
        {
            $this->videoId = $matches[1];
            $this->url = new \Embera\Url('http://www.viddler.com/v/' . $this->videoId);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        if (is_null($this->videoId))
            return array();

        $html = '<iframe width="{width}" height="{height}" src="{video}" frameborder="0" allowfullscreen></iframe>';
        $t = array(
            '{video}' => 'http://viddler.com/embed/' . $this->videoId,
            '{width}' => $this->getWidth(),
            '{height}' => $this->getHeight()
        );

        $data = array(
            'type' => 'video',
            'provider_name' => 'Viddler',
            'provider_url' => 'http://www.viddler.com',
            'title' => 'Unknown title',
            'html' => str_replace(array_keys($t), array_values($t), $html)
        );

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
