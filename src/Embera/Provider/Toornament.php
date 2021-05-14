<?php
/**
 * Toornament.php
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
 * Toornament Provider
 * Toornament.com is the eSports platform for tournaments organizers, their participants and their...
 *
 * @link https://toornament.com
 *
 */
class Toornament extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://widget.toornament.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'toornament.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~toornament\.com/([^/]+)/tournaments/([^/]+)/(information|registration|matches/schedule|stages/([^/]+))~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~toornament\.com/([^/]+)/(.+)$~i', (string) $this->url, $matches);
        $embedUrl = 'https://widget.toornament.com/' . $matches['2']. '/?_locale=' . $matches['1'];

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Toornament',
            'provider_url' => 'https://toornament.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
