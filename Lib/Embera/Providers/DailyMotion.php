<?php
/**
 * DailyMotion.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class DailyMotion extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://www.dailymotion.com/services/oembed?format=json';
    protected $videoId = null;
    protected $videoTitle = null;

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~dailymotion\.com/video/(?:[^/"\'<>]+)/?~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/video/([^/\? ]+)~i', $this->url, $matches))
        {
            $full = $matches['1'];
            @list($this->videoId, $this->videoTitle) = explode('_', $full, 2);
            $this->url = 'http://www.dailymotion.com/video/' . $full;
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
        if (empty($this->videoId))
            return array();

        $html = '<iframe src="{video}" width="{width}" height="{height}" frameborder="0"></iframe>';
        $t = array('{video}' => 'http://www.dailymotion.com/embed/video/' . $this->videoId,
                   '{width}' => $this->getWidth(),
                   '{height}' => $this->getHeight());

        $data = array('type' => 'video',
                      'provider_name' => 'Dailymotion',
                      'provider_url' => 'http://www.dailymotion.com',
                      'title' => (!empty($this->videoTitle) ? str_replace(array('-', '_'), ' ', $this->videoTitle) : 'Unknown Title'),
                      'html' => str_replace(array_keys($t), array_values($t), $html));

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
