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
 * @link http://dailymotion.com
 * @link http://www.dailymotion.com/doc/api/oembed.html
 */
class DailyMotion extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.dailymotion.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->addWWW();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~dailymotion\.com/video/(?:[^/]+)/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~dailymotion\.com/(?:embed/)?(?:video|live)/([^/]+)/?~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://www.dailymotion.com/video/' . $matches['1']);
        } else if (preg_match('~dai\.ly/([^/]+)/?~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://www.dailymotion.com/video/' . $matches['1']);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/video/([^/]+)~i', $this->url, $matches);

        @list($videoId, $videoTitle) = explode('_', $matches['1'], 2);

        return array(
            'type' => 'video',
            'provider_name' => 'Dailymotion',
            'provider_url' => 'http://www.dailymotion.com',
            'title' => (!empty($videoTitle) ? str_replace(array('-', '_'), ' ', $videoTitle) : 'Unknown Title'),
            'html' => '<iframe frameborder="0" width="{width}" height="{height}" src="http://www.dailymotion.com/embed/video/' . $videoId . '" allowfullscreen></iframe>'
        );
    }
}

?>
