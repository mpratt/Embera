<?php
/**
 * FITE.php
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
 * FITE Provider
 * Stream all the action to your big-screen TV!
 *
 * @link https://fite.tv
 */
class FITE extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.fite.tv/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'fite.tv'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~fite\.tv/watch/(?:[^/]+)/([^/]+)/?~i', (string) $url));
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
        preg_match('~fite\.tv/watch/(?:[^/]+)/([^/]+)/?~i', (string) $this->url, $matches);

        $html = '<div style="height: 270px; width: 480px;" data-id="' . $matches['1'] . '" class="kdv-embed" data-type="v" data-ap="true"></div> <script src="https://www.fite.tv/embed.1.js"></script';

        return [
            'type' => 'video',
            'provider_name' => 'FITE',
            'provider_url' => 'https://fite.tv',
            'title' => 'Unknown title',
            'html' => $html,
        ];
    }

}
