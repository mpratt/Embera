<?php
/**
 * Issuu.php
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
 * Issuu.php Provider
 * @link https://issuu.com
 */
class Issuu extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://issuu.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'issuu.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~issuu\.com/([^/]+)/docs/([^/]+)$~i', (string) $url));
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
        return [
            'type' => 'rich',
            'provider_name' => 'Issuu',
            'provider_url' => 'https://issuu.com',
            'title' => 'Unknown title',
            'html' => '<div data-url="' . $this->url . '" style="width: {width}px; height: {height}px;" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>',
        ];
    }

}
