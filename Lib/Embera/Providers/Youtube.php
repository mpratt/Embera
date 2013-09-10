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

    /** @var array An array with query string of the current url */
    protected $query = array();

    /** inline {@inheritdoc} */
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

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~(?:v=|youtu\.be/|youtube\.com/embed/)([a-z0-9_-]+)~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://www.youtube.com/watch?v=' . $matches[1]);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $html = '<iframe width="{width}" height="{height}" src="{video}" frameborder="0" allowfullscreen>';
        $t = array(
            '{video}' => 'http://www.youtube.com/embed/' . $this->query['v'],
            '{width}' => $this->getWidth(),
            '{height}' => $this->getHeight()
        );

        $data = array(
            'type' => 'video',
            'provider_name' => 'Youtube',
            'provider_url' => 'http://www.youtube.com',
            'title' => 'Unknown title',
            'html' => str_replace(array_keys($t), array_values($t), $html)
        );

        return $this->oembed->buildFakeResponse($data);
    }
}

?>
