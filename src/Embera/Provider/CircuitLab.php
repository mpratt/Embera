<?php
/**
 * CircuitLab.php
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
 * CircuitLab Provider
 * Build and simulate circuits right in your browser.
 *
 * @link https://www.circuitlab.com
 *
 */
class CircuitLab extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.circuitlab.com/circuit/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'circuitlab.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~circuitlab\.com/circuit/(?:\w+)/(?:[^/]+)/$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->addWWW();
        $url->removeQueryString();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~circuitlab\.com/circuit/(\w+)/~i', $this->url, $matches);

        $embedUrl = 'https://www.circuitlab.com/circuit/' . $matches['1'] . '/embed_target/?width={width}';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';

        return [
            'type' => 'rich',
            'provider_name' => 'CircuitLab',
            'provider_url' => 'https://www.circuitlab.com/',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
