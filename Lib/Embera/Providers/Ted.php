<?php
/**
 * Ted.php
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
 * The ted.com Provider
 * @link http://ted.com
 */
class Ted extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.ted.com/talks/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~ted\.com/talks/(?:.*)\.html$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = preg_replace('~http(?:.*)ted\.com/~i', 'http://embed.ted.com/$1', $this->url);
        return array(
            'type' => 'video',
            'provider_name' => 'TED',
            'provider_url' => 'http://ted.com',
            'html' => '<iframe src="' . $url . '" width="{width}" height="{height}" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe',
        );
    }
}

?>
