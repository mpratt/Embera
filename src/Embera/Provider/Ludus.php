<?php
/**
 * Ludus.php
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
 * Ludus Provider
 * Ludus is an advanced presentation tool for creative professionals. It&#x27;s like Sketch and Ke...
 *
 * @link https://ludus.one
 *
 */
class Ludus extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.ludus.one/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'app.ludus.one'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        // a4465cd5-ee82-4534-9755-5e658a7cb198
        return (bool) (preg_match('~\.ludus\.one/(\w{8})-((\w{4}-){3})(\w{12})$~i', (string) $url));
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
        // <iframe width="960" height="540" src="https://app.ludus.one/fd01598e-5ed7-4edb-8d0e-cf75a36e0a07/full" frameborder="0" allowfullscreen></iframe>
        $embedUrl = $this->url . '/full';

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Ludus',
            'provider_url' => 'https://app.ludus.one',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
