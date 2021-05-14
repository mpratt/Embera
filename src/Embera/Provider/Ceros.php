<?php
/**
 * Ceros.php
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
 * Ceros Provider
 * Ceros is a cloud-based design platform that allows marketers and designers
 * to create immersive content without writing a single line of code
 *
 * @link https://ceros.com
 *
 */
class Ceros extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://view.ceros.com/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'view.ceros.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ceros\.com/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }

}
