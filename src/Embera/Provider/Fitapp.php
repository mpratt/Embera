<?php
/**
 * Fitapp.php
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
 * Fitapp Provider
 * @link https://fitapp.pro
 */
class Fitapp extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://fitapp.pro/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'fitapp.pro', 'mybeweeg.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(fitapp\.pro|mybeweeg\.com)/w/(?:[^/]+)$~i', (string) $url));
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
        preg_match('~/w/([^/]+)~i', (string) $this->url, $matches);

        $embedUrl = 'https://fitapp.pro/embed?workout=' . $matches['1'];

        $attr = [];
        $attr[] = 'frameborder="0"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';

        return [
            'type' => 'rich',
            'provider_name' => 'Fitapp',
            'provider_url' => 'https://fitapp.pro',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
