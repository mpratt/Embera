<?php
/**
 * TheNewYorkTimes.php
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
 * TheNewYorkTimes Provider
 * Live news, investigations, opinion, photos and video by the journalists of The New York Times f...
 *
 * @link https://nytimes.com
 *
 */
class TheNewYorkTimes extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.nytimes.com/svc/oembed/json/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'nytimes.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~nytimes\.com/(.+)\.html$~i', (string) $url));
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
        $embedUrl = 'https://www.nytimes.com/svc/oembed/html/?url=' . urlencode($this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowtransparency="true"';
        $attr[] = 'title=""';
        $attr[] = 'style="border:none;max-width:500px;min-width:300px;min-height:550px;display:block;width:100%;"';

        return [
            'type' => 'rich',
            'provider_name' => 'TheNewYorkTimes',
            'provider_url' => 'https://nytimes.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
