<?php
/**
 * OraTV.php
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
 * OraTV Provider
 * @link https://ora.tv
 */
class OraTV extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.ora.tv/oembed/0_{url_id}?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ora.tv'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ora\.tv/(?:.+)0_([^/]+)$~i', (string) $url));
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
        preg_match('~ora\.tv/(?:.+)0_([^/]+)$~i', (string) $this->url, $m);
        return str_replace('{url_id}', $m['1'], $this->endpoint);
    }

}
