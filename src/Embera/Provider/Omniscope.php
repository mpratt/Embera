<?php
/**
 * Omniscope.php
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
 * Omniscope Provider
 * @link https://omniscope.me
 */
class Omniscope extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://omniscope.me/_global_/oembed/json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'omniscope.me'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~omniscope\.me/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $this->url . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Omniscope',
            'provider_url' => 'https://omniscope.me',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
