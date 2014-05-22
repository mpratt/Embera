<?php
/**
 * Cacoo.php
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
 * The cacoo.com Provider
 * @link http://cacoo.com
 * @link https://cacoo.com/lang/en/api_oembed
 */
class Cacoo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://cacoo.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();

        return (preg_match('~cacoo\.com/diagrams/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/diagrams/([\w\d]+)/~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('https://cacoo.com/diagrams/' . $matches['1']);
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/diagrams/([\w\d]+)/?$~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'Cacoo',
            'provider_url' => 'http://cacoo.com',
            'html' => '<iframe src="https://cacoo.com/diagrams/' . $matches['1'] . '/view?w={width}&h={height}" width="{width}" height="{height}" frameborder="0"></iframe>',
            'thumbnail_url' => 'https://cacoo.com/diagrams/' . $matches['1'] . '-w{width}-h{height}.png'
        );
    }
}

?>
