<?php
/**
 * Hivo.php
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
 * Hivo Provider
 *
 * @link https://app.hivo.com.au
 */
class Hivo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.hivo.com.au/api/drupal/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'cdn.hivo.com.au',
        'cdn.digital-assets.uq.edu.au',
        'cdn.southerndesigngroup.com',
        'freedom.hivocdn.com',
        'cdn.cockburn.wa.gov.au',
        'cdn.somnomed.com',
        'cdn.snowtunnel.com',
        'cdn.brenclosures.com.au'
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
        return (bool) (preg_match('~(cdn\.hivo\.com\.au|cdn\.digital-assets\.uq\.edu\.au|cdn\.southerndesigngroup\.com|freedom\.hivocdn\.com|cdn\.cockburn\.wa\.gov\.au|cdn\.somnomed\.com|cdn\.snowtunnel\.com|cdn\.brenclosures\.com\.au)/([^/]+)~i', (string) $url));
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
