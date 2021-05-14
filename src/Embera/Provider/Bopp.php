<?php
/**
 * Bopp.php
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
 * Bopp Provider
 * Image Hosting That Isn't Bad!
 *
 * This provider generates the html code when not available.
 *
 * @link https://i.bopp.tk
 * @todo Might support fake responses
 *
 */
class Bopp extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://api.bopp.tk/v1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'i.bopp.tk'
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
        return (bool) (preg_match('~i\.bopp\.tk/([^/]+)~i', (string) $url));
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
    public function modifyResponse(array $response = [])
    {
        if (empty($response['html'])) {
            $response['html'] = '<img src="' . $response['url'] . '" alt="" title="">';
        }

        return $response;
    }

}
