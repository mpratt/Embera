<?php
/**
 * Typecast.php
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
 * Typecast Provider
 * @link https://play.typecast.ai
 */
class Typecast extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://play.typecast.ai/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'play.typecast.ai'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~typecast\.ai/([se])/([^/]+)~i', (string) $url));
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
        // <iframe width="400" height="65" scrolling="no" frameborder="no" src="https://play.typecast.ai/e/5cdd8da6f3a83a0007b80b17"></iframe>
        $embedUrl = str_replace('/s/', '/e/', (string) $this->url);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Typecast',
            'provider_url' => 'https://play.typecast.ai',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
