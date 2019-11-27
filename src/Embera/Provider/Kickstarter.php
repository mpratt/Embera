<?php
/**
 * Kickstarter.php
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
 * Kickstarter Provider
 * @link https://kickstarter.com
 */
class Kickstarter extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.kickstarter.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'kickstarter.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~kickstarter\.com/projects/([^/]+)/([^/]+)~i', (string) $url));
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
        $embedUrl = $this->url . '/widget/video.html';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="{width}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';

        return [
            'type' => 'rich',
            'provider_name' => 'Kickstarter',
            'provider_url' => 'https://kickstarter.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
