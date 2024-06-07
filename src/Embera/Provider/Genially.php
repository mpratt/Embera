<?php
/**
 * Genially.php
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
 * Genially Provider
 * Engage your audience with clickable, gamified, media-rich experiences. Create your interactive content now!
 *
 * @link https://genially.com
 */
class Genially extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://genially.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.genial.ly',
        '*.genially.com',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~view\.(?:genial\.ly|genially\.com)/[a-z0-9]{24}(?:$|/)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }
}
