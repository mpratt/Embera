<?php
/**
 * Zoomable.php
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
 * Zoomable Provider
 * @link https://*.zoomable.ca
 */
class Zoomable extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://srv2.zoomable.ca/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.zoomable.ca'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~zoomable\.ca/viewer\.php\?i=(.+)~i', (string) $url));
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
        preg_match('~(\?|&)i=(.+)~i', (string) $this->url, $matches);
        $embedUrl = 'http://srv2.zoomable.ca/viewer.php?i=' . $matches['2'];

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Zoomable',
            'provider_url' => 'https://zoomable.ca',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
