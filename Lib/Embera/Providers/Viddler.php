<?php
/**
 * Viddler.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Viddler extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://www.viddler.com/oembed/?format=json';
    protected $videoId = null;

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~viddler\.com/v/(?:[0-9a-f]{7,12})/?$~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/(?:v|embed)/([0-9a-f]{7,12})/?~i', $this->url, $matches))
        {
            $this->videoId = $matches[1];
            $this->url = 'http://www.viddler.com/v/' . $this->videoId;
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

        $html = '<iframe width="{width}" height="{height}" src="{video}" frameborder="0" allowfullscreen></iframe>';
        $t = array(
            '{video}' => 'http://viddler.com/embed/890702a2',
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
