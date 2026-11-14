<?php
/**
 * IcosaGallery.php
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
 * IcosaGallery Provider
 *
 * @link https://icosa.gallery
 */
class IcosaGallery extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.icosa.gallery/v1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'icosa.gallery'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~icosa\.gallery/view/([^/]+)~i', (string) $url));
    }

    /**
     * The endpoint only accepts the relative path of the embed page
     * instead of the full url.
     *
     * inline {@inheritdoc}
     */
    public function getParams()
    {
        $params = parent::getParams();
        $params['url'] = parse_url($params['url'], PHP_URL_PATH) . '/embed';

        return $params;
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }
}
