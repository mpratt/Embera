<?php
/**
 * Wordwall.php
 *
 * @package Embera
 * @author Matías Minevitz <matias.minevitz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Wordwall Provider
 * @link https://wordwall.net/
 * @link https://wordwall.net/about/oembed
 */
class Wordwall extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://wordwall.net/api/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'wordwall.net'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~wordwall\.net/(?:(?:[^/]+/)?resource|play)/.*+~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}
