<?php
/**
 * Nfb.php
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
 * Nfb Provider
 * Watch quality Canadian documentary, animation and fiction films online
 *
 * @link https://nfb.ca
 *
 */
class Nfb extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.nfb.ca/remote/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'nfb.ca'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~nfb\.ca/(?:film|playlist)/([^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        // The html response comes "encoded" ... booooo :(, need to decode in order to work..
        if (!empty($response['html'])) {
            $response['html'] = html_entity_decode($response['html'], ENT_QUOTES, 'UTF-8');
        }

        return $response;
    }

}
