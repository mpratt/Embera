<?php
/**
 * Scribd.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Scribd Provider
 * The world's largest digital library. Read unlimited books and audiobooks. Access millions of do...
 *
 * @link https://scribd.com
 *
 */
class Scribd extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.scribd.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'scribd.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~scribd\.com/(doc|document)/([0-9]+)/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~/(doc|document)/([\d]+)/~i', (string) $this->url, $matches);

        $embedUrl = 'https://www.scribd.com/embeds/' . $matches['1'] . '/content';

        $attr = [];
        $attr[] = 'class="scribd_iframe_embed"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'data-aspect-ratio=""';
        $attr[] = 'scrolling="no"';
        $attr[] = 'id="' . $matches['1'] . '"';
        $attr[] = 'width="100%"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'Scribd',
            'provider_url' => 'https://scribd.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe><script type="text/javascript"> (function() { var scribd = document.createElement("script"); scribd.type = "text/javascript"; scribd.async = true; scribd.src = "https://www.scribd.com/javascripts/embed_code/inject.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(scribd, s); })() </script>',
        ];
    }

}
