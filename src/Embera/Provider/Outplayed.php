<?php
/**
 * Outplayed.php
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
 * Outplayed Provider
 * @link https://outplayed.tv
 */
class Outplayed extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://outplayed.tv/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'outplayed.tv'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~outplayed\.tv/media/([^/]+)(?:/(.+))?$~i', (string) $url));
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
        preg_match('~outplayed\.tv/media/([^/]+)~i', (string) $this->url, $m);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="https://outplayed.tv/embed/media/' . $m['1'] . '"';

        return [
            'type' => 'video',
            'provider_name' => 'Outplayed',
            'provider_url' => 'https://outplayed.tv',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
