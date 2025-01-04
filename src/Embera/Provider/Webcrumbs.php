<?php
/**
 * Webcrumbs.php
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
 * Webcrumbs Provider
 *
 * @link https://share.webcrumbs.org|tools.webcrumbs.org|www.webcrumbs.org
 */
class Webcrumbs extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://tools.webcrumbs.org/?embed=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.webcrumbs.org'
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
        return (bool) (preg_match('~webcrumbs\.org/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    public function getEndpoint()
    {
        if (preg_match('~webcrumbs\.org/([^/]+)~i', (string) $this->url, $matches)) {
            return 'http://share.webcrumbs.org/' . $matches[1] . '?embed=json';
        }

        return $this->endpoint;
    }
}
