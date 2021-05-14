<?php
/**
 * BlackfireIO.php
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
 * BlackfireIO Provider
 * Blackfire empowers all developers and IT/Ops to continuously verify and improve their app’s
 * performance, throughout its lifecycle, by getting the right information at the right moment.
 *
 * @link https://blackfire.io
 *
 */
class BlackfireIO extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://blackfire.io/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'blackfire.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~blackfire\.io/profiles/(?:compare/)?(?:[^/]+)/(graph|embed)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeLastSlash();
        $url->removeQueryString();

        if (preg_match('~blackfire\.io/profiles/(?:compare/)?(?:[^/]+)/embed$~i', (string) $url)) {
            $url->overwrite(str_replace('/embed', '/graph', $url));
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/graph', '/embed', $this->url);

        $attr = [];
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowfullscreen';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';

        return [
            'type' => 'rich',
            'provider_name' => 'Blackfire.io',
            'provider_url' => 'https://blackfire.io',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
