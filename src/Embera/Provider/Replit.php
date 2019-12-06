<?php
/**
 * Replit.php
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
 * Replit Provider
 * @link https://repl.it
 */
class Replit extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://repl.it/data/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'repl.it'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~repl\.it/([^/]+)/([^/]+)$~i', (string) $url));
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
        $embedUrl = $this->url . '/?lite=true';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'Replit',
            'provider_url' => 'https://repl.it',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
