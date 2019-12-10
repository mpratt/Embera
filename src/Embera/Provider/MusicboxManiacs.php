<?php
/**
 * MusicboxManiacs.php
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
 * MusicboxManiacs Provider
 * @link https://musicboxmaniacs.com
 */
class MusicboxManiacs extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://musicboxmaniacs.com/embed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'musicboxmaniacs.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~musicboxmaniacs\.com/explore/melody/([^/]+)/?$~i', (string) $url));
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
        $embedUrl = str_replace('/explode/', '/embed/', $this->url);

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="margin: 0; padding: 0; border: none; overflow: hidden;"';

        return [
            'type' => 'rich',
            'provider_name' => 'MusicboxManiacs',
            'provider_url' => 'https://musicboxmaniacs.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
