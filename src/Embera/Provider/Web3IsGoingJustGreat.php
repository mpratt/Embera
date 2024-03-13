<?php
/**
 * Web3IsGoingJustGreat.php
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
 * Web3IsGoingJustGreat Provider
 *
 * @link https://www.web3isgoinggreat.com|www.web3isgoinggreat.com|www.web3isgoinggreat.com
 */
class Web3IsGoingJustGreat extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.web3isgoinggreat.com/api/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'web3isgoinggreat.com'
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
        return (bool) (preg_match('~web3isgoinggreat\.com/(\?id\=|single/|embed/)([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }
}
