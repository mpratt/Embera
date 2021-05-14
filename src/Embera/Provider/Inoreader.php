<?php
/**
 * Inoreader.php
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
 * Inoreader Provider
 * One place to keep up with all your information sources. With Inoreader, content comes to you, t...
 *
 * @link https://inoreader.com
 * @see https://www.inoreader.com/developers/oembed
 */
class Inoreader extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.inoreader.com/oembed/api/article?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'inoreader.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~inoreader\.com/article/([^/]+)$~i', (string) $url));
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
        $embedUrl = str_replace('/article/', '/oembed/article/', $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="yes"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowtransparency="true"';
        $attr[] = 'style="position:absolute;overflow-x:hidden;border:none;max-width:400px;max-height:500px;display:block;width:100%;height:100%;"';

        return [
            'type' => 'rich',
            'provider_name' => 'Inoreader',
            'provider_url' => 'https://inoreader.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
