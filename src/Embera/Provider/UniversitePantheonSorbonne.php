<?php
/**
 * UniversitePantheonSorbonne.php
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
 * UniversitePantheonSorbonne Provider
 * @link https://mediatheque.univ-paris1.fr
 */
class UniversitePantheonSorbonne extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://mediatheque.univ-paris1.fr/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'mediatheque.univ-paris1.fr'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~mediatheque\.univ-paris1\.fr/video/([^/]+)/$~i', (string) $url));
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
        $embedUrl = $this->url . '?is_iframe=true';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'style="padding: 0; margin: 0; border:0"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'UniversitePantheonSorbonne',
            'provider_url' => 'https://mediatheque.univ-paris1.fr',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
