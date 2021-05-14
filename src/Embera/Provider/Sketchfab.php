<?php
/**
 * Sketchfab.php
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
 * Sketchfab Provider
 * With a community of over one million creators, we are the world’s largest platform to publish...
 *
 * @link https://sketchfab.com
 *
 */
class Sketchfab extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://sketchfab.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'sketchfab.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~sketchfab\.com/3d-models/([^/]+)~i', (string) $url));
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
