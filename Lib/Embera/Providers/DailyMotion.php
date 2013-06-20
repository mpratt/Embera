<?php
/**
 * DailyMotion.php
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
 * The DailyMotion.com Provider
 */
class DailyMotion extends \Embera\Adapters\Service
{

    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.dailymotion.com/services/oembed?format=json';

    /** @var string The id of the current video based on its url */
    protected $videoId = null;

    /** @var string The title of the current video based on its url */
    protected $videoTitle = null;

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~dailymotion\.com/video/(?:[^/"\'<>]+)/?~i', $this->url));
    }

    /**
     * {@inheritdoc}
     * This method also tries to extract the video title and id, and
     * stores them into properties
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

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        if (empty($this->videoId))
            return array();

        $html = '<iframe src="{video}" width="{width}" height="{height}" frameborder="0"></iframe>';
        $t = array(
            '{video}' => 'http://www.dailymotion.com/embed/video/' . $this->videoId,
            '{width}' => $this->getWidth(),
            '{height}' => $this->getHeight()
        );

        $data = array(
            'type' => 'video',
            'provider_name' => 'Dailymotion',
            'provider_url' => 'http://www.dailymotion.com',
            'title' => (!empty($this->videoTitle) ? str_replace(array('-', '_'), ' ', $this->videoTitle) : 'Unknown Title'),
            'html' => str_replace(array_keys($t), array_values($t), $html)
        );

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
