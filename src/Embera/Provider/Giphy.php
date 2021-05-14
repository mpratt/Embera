<?php
/**
 * Giphy.php
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
 * Giphy Provider
 * GIPHY is your top source for the best &amp; newest GIFs &amp; Animated Stickers online. Find ev...
 *
 * @link http://giphy.com
 *
 */
class Giphy extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://giphy.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'giphy.com', 'gph.is', 'media.giphy.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~giphy\.com/(gifs|stickers|clips)/([^/]+)~i', (string) $url) ||
            preg_match('~giphy\.com/media/([^/]+)/giphy.gif$~i', (string) $url) ||
            preg_match('~gph\.is/g/([^/]+)$~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        // @link https://github.com/Giphy/GiphyAPI/issues/182
        $url->overwrite(preg_replace('~/(links|media|embed|html5)$~', '', (string) $url));
        $url->convertToHttp();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (empty($response['html']) && !empty($response['url'])) {
            $response['html'] = '<div class="giphy-oembed"><img class="giphy" src="' . $response['url'] . '" style="width:100%;height:auto;" alt="" title=""></div>';
        }

        return $response;
    }

}
