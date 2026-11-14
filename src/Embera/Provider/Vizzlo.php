<?php
/**
 * Vizzlo.php
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
 * Vizzlo Provider
 *
 * @link https://vizzlo.com
 */
class Vizzlo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://vizzlo.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'vizzlo.com',
        'eu.vizzlo.com'
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
        return (bool) (preg_match('~vizzlo\.com/(d|share|embed)/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function getEndpoint()
    {
        if (preg_match('~//eu\.vizzlo\.com/~i', (string) $this->url)) {
            $this->endpoint = 'https://eu.vizzlo.com/oembed?format=json';
        }

        return (string) $this->endpoint;
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
