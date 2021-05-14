<?php
/**
 * GettyImages.php
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
 * GettyImages Provider
 * Encuentra la imagen libre de derechos perfecta para tu próximo proyecto en el mejor catálogo ...
 *
 * @link https://gettyimages.com
 * @see https://developers.gettyimages.com/api/oembed/
 */
class GettyImages extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://embed.gettyimages.com/oembed?format=json&caller=embera';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'gty.im', '*.gettyimages.com', '*.gettyimages.com.mx', '*.gettyimages.com.au', '*.gettyimages.com.be',
        '*.gettyimages.com.br', '*.gettyimages.com.ca', '*.gettyimages.com.de', '*.gettyimages.es', '*.gettyimages.fr',
        '*.gettyimages.in', '*.gettyimages.ie', '*.gettyimages.it', '*.gettyimages.nl', '*.gettyimages.no', '*.gettyimages.co.nz',
        '*.gettyimages.at', '*.gettyimages.pt', '*.gettyimages.ch', '*.gettyimages.fi', '*.gettyimages.se', '*.gettyimages.ae',
        '*.gettyimages.co.uk', '*.gettyimages.hk', '*.gettyimages.co.jp'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'caller', 'caption', 'tld' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~gty\.im/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->removeQueryString();

        if (preg_match('~/detail/(?:(?:[^/]+)/(?:[^/]+)/)?([^/]+)$~i', (string) $url, $matches)) {
            $url->overwrite('https://gty.im/' . $matches['1']);
        }

        $url->removeLastSlash();
        $url->convertToHttps();
        $url->removeWWW();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (!empty($response['html'])) {
            return $response;
        }

        $check = [
            'url', 'thumbnail_url', 'thumbnail_width', 'thumbnail_height', 'title'
        ];

        foreach ($check as $c) {
            if (!isset($response[$c])) {
                return $response;
            }
        }

        $html = [];
        $html[] = '<a href="' . $response['url'] . '" target="_blank">';
        $html []= '<img class="gettyimages-oembed" src="' . $response['thumbnail_url'] . '" width="' . $response['thumbnail_width'] . '" height="' . $response['thumbnail_height'] . '" alt="" title="" >';
        $html[] = '</a>';

        $response['html'] = implode('', $html);

        return $response;
    }

}
