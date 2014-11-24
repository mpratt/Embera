<?php
/**
 * Vine.php
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
 * The vine.co Provider
 * @link https://vine.co
 * @link https://dev.twitter.com/web/vine/oembed
 */
class Vine extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://vine.co/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();

        return (preg_match('~vine\.co/v/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        return array(
            'type' => 'video',
            'provider_name' => 'Vine',
            'provider_url' => 'https://vine.co',
            'title' => 'Unknown title',
            'html' => '<iframe class="vine-embed" src="' . (string) $this->url . '/embed/simple" width="{width}" height="{height}" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js"></script>',
        );
    }
}

?>
