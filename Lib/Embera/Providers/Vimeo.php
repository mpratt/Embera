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
    protected $apiUrl = 'https://vimeo.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->stripLastSlash();

        return (preg_match('~/(?:[0-9]{5,12})$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripQueryString();

        if (preg_match('~/([0-9]{5,12})/?$~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://vimeo.com/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/([0-9]{5,12})$~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Vimeo',
            'provider_url' => 'http://www.vimeo.com',
            'title' => 'Unknown title',
            'html' => '<iframe src="http://player.vimeo.com/' . $matches['1'] . '" width="{width}" height="{height}" frameborder="0" title="" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
        );
    }
}

?>
