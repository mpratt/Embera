<?php
/**
 * Kit.php
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
 * Kit Provider
 * @link https://kit.co
 */
class Kit extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://embed.kit.co/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'kit.com', 'kit.co'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~kit\.com?/([^/]+)/([^/]+)~i', (string) $url));
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
        preg_match('~v=([a-z0-9_\-]+)~i', (string) $this->url, $matches);

        $embedUrl = '//embed.kit.co/embed?url=' . $this->url;

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="display: block; border: 0px; margin: 0 auto; width: 100%; height: 100vw; max-width: 700px; max-height: 700px"';
        $attr[] = 'scrolling="no"';

        return [
            'type' => 'rich',
            'provider_name' => 'Kit',
            'provider_url' => 'https://kit.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }
}
