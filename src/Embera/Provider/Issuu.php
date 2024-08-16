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
 * Issuu Provider
 * Issuu is the digital publishing platform chosen by millions to convert content into high-qualit...
 *
 * @link https://issuu.com
 *
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
        preg_match('~issuu\.com/([^/]+)/docs/([^/]+)$~i', $this->url, $matches);

        $attrs = [
            'src="https://e.issuu.com/embed.html?u=' . $matches['1'] . '&d=' . $matches['2'] . '"',
            'style="border:none; width: {width}; height: {height};"',
            'allow="clipboard-write,allow-top-navigation,allow-top-navigation-by-user-activation,allow-downloads,allow-scripts,allow-same-origin,allow-popups,allow-modals,allow-popups-to-escape-sandbox,allow-forms"',
            'allowfullscreen="true"',
        ];

        return [
            'type' => 'rich',
            'provider_name' => 'Issuu',
            'provider_url' => 'https://issuu.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attrs) . '></iframe>',
        ];
    }

}
