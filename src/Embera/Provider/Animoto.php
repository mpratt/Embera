<?php
/**
 * Animoto.php
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
 * Animoto Provider
 * Create professional videos for work and life
 *
 * @link https://animoto.com/
 * @see https://help.animoto.com/hc/en-us/articles/205538717-oembed-api
 *
 */
class Animoto extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://animoto.com/oembeds/create?format=json&ssl=true';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'animoto.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~animoto\.com/play/(?:\w+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }

}
