<?php
/**
 * Yotube.php
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
 * The youtube.com Provider
 */
class Youtube extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.youtube.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~v=(?:[a-z0-9_-]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~(?:v=|youtu\.be/|youtube\.com/embed/)([a-z0-9_-]+)~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://www.youtube.com/watch?v=' . $matches[1]);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~v=([a-z0-9_-]+)~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Youtube',
            'provider_url' => 'http://www.youtube.com',
            'title' => 'Unknown title',
            'html' => '<iframe width="{width}" height="{height}" src="//www.youtube.com/embed/' . $matches['1'] . '" frameborder="0" allowfullscreen></iframe>',
        );
    }
}

?>
