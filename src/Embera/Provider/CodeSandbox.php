<?php
/**
 * CodeSandbox.php
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
 * CodeSandbox Provider
 * Create, share, and get feedback with collaborative
 * sandboxes for rapid web development.
 *
 * @link https://codesandbox.io
 *
 */
class CodeSandbox extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://codesandbox.io/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.codesandbox.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~codesandbox\.io/(s|embed)/(?:[^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeWWW();
        $url->removeQueryString();
        $url->removeLastSlash();

        if (preg_match('~/embed/~', (string) $url)) {
            $url->overwrite(str_replace('/embed/', '/s/', $url));
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/s/', '/embed/', $this->url);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="width:{width}px; height:{height}px; border:0; border-radius: 4px; overflow:hidden;"';
        $attr[] = 'sandbox="allow-modals allow-forms allow-popups allow-scripts allow-same-origin"';

        return [
            'type' => 'rich',
            'provider_name' => 'CodeSandbox',
            'provider_url' => 'http://codesandbox.io/',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
