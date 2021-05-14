<?php
/**
 * CodePen.php
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
 * CodePen Provider
 * CodePen is a social development environment for front-end designers and developers
 *
 * @link https://codepen.io
 */
class CodePen extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://codepen.io/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'codepen.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~codepen\.io/(?:[^/]+)/pen/(?:[^/]+)~i', (string) $url));
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
        preg_match('~codepen\.io/([^/]+)/pen/([^/]+)~i', (string) $this->url, $matches);

        $embedUrl = 'https://codepen.io/' . $matches['1']. '/embed/preview/' . $matches['2'] . '?default-tabs=html%2Cresult&amp;height=300&amp;host=https%3A%2F%2Fcodepen.io&amp;slug-hash=' . $matches['2'];

        $attr = [];
        $attr[] = 'id="cp_embed_' . $matches['2'] . '"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'title=""';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'height="{height}"';
        $attr[] = 'allowtransparency="true"';
        $attr[] = 'class="cp_embed_iframe"';
        $attr[] = 'style="width: 100%; overflow: hidden;"';

        return [
            'type' => 'rich',
            'provider_name' => 'CodePen',
            'provider_url' => 'https://codepen.io',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
