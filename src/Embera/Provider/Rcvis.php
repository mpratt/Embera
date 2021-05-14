<?php
/**
 * Rcvis.php
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
 * Rcvis Provider
 * Ranked-Choice Voting visualizations: interactive charts, graphs, tables, and wikipedia exports ...
 *
 * @link https://rcvis.com
 *
 */
class Rcvis extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://rcvis.com/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'rcvis.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~rcvis\.com/(ve?/|visualize\=|visualizeEmbedded\=)([^/]+)~i', (string) $url));
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
    public function modifyResponse(array $response = [])
    {
        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~v=([a-z0-9_\-]+)~i', (string) $this->url, $matches);

        $embedUrl = '';

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => '',
            'provider_name' => 'Rcvis',
            'provider_url' => 'https://rcvis.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
