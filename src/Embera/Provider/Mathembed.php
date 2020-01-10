<?php
/**
 * Mathembed.php
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
 * Mathembed Provider
 * @link https://mathembed.com
 */
class Mathembed extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://www.mathembed.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'mathembed.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~mathembed\.com/latex\?inputText=([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $attr = [];
        $attr[] = 'width="100%"';
        $attr[] = 'height="200"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'src="' . $this->url . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Mathembed',
            'provider_url' => 'https://mathembed.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
