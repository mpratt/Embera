<?php
/**
 * Orbitvu.php
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
 * Orbitvu Provider
 * Upload photos from any device to the cloud and get 360 degree presentations. Easy to share and ...
 *
 * @link https://orbitvu.co
 *
 */
class Orbitvu extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://orbitvu.co/service/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'orbitvu.co'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~orbitvu\.co/(.+)/view$~i', (string) $url));
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
