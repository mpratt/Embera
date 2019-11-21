<?php
/**
 * Flat.php
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
 * Flat Provider
 * @link https://flat.io
 */
class Flat extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://flat.io/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.flat.io'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~flat\.io/score/([^/]+)$~i', (string) $url));
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
        preg_match('~flat\.io/score/([^/-]+)~i', (string) $this->url, $matches);

        // <iframe src="https://flat.io/embed/5bb008d9888e140d3e3a6cec?" allowfullscreen height="400" width="800" frameBorder="0"></iframe>
        $embedUrl = 'https://flat.io/embed/' . $matches['1'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'allowfullscreen';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'frameBorder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'Flat',
            'provider_url' => 'https://flat.io',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
