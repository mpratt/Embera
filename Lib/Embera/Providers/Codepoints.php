<?php
/**
 * Codepoints.php
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
 * The Codepoints Provider
 * @link http://codepoints.net
 */
class Codepoints extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://codepoints.net/api/v1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();
        $this->url->convertToHttps();

        return (preg_match('~codepoints\.net/U\+(?:[\w]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/U\+([\w]+)$~i', $this->url, $m);

        return array(
            'type' => 'rich',
            'provider_name' => 'Codepoints.net',
            'provider_url' => 'http://codepoints.net/',
            'thumbnail_url' => 'http://codepoints.net/api/v1/glyph/' . $m['1'],
            'html' => '<iframe src="http://codepoints.net/U+' . $m['1'] . '?embed" style="width: {width}px; height: {height}px; border: 1px solid #444;"></iframe>',
        );
    }
}

?>
