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

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->addWWW();

        return (preg_match('~viddler\.com/(?:v|embed)/(?:[0-9a-f]{7,12})/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~viddler\.com/(?:embed|v)/([^/]+)/?~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://www.viddler.com/v/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/(?:v|embed)/([0-9a-f]{7,12})/?~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Viddler',
            'provider_url' => 'http://www.viddler.com',
            'title' => 'Unknown title',
            'html' => '<iframe width="{width}" height="{height}" src="http://viddler.com/embed/' . $matches['1'] . '" frameborder="0" allowfullscreen></iframe>',
        );
    }
}

?>
