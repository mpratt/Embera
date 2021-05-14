<?php
/**
 * Chirbit.php
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
 * Chirbit Provider
 * Chirbit is all you need to share your audio on social media or your own website.
 *
 * @link https://www.chirbit.com
 *
 */
class Chirbit extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://chirb.it/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'chirb.it'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~chirb\.it/(?:\w+)~i', (string) $url));
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
        preg_match('~chirb\.it/(\w+)/?~i', $this->url, $matches);

        $embedUrl = 'https://chirb.it/' . $matches['1'];

        $attr = [];
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'scrolling="NO"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Chirbit',
            'provider_url' => 'https://chirbit.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '>This browser does not show iframe content. Listen to this chirbit here <a href="' . $embedUrl . '">' . $embedUrl . '</a></iframe>',
        ];
    }

}
