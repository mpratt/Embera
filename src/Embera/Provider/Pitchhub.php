<?php
/**
 * Pitchhub.php
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
 * Pitchhub Provider
 * PitchHub streamlines your video production workflow required to
 * create professional videos from one platform.
 *
 * @link https://pitchhub.com
 *
 */
class Pitchhub extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://{subdomain}.pitchhub.com/en/public/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.pitchhub.com'
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
        return (bool) (preg_match('~(player|player\-dev|player\-staging)\.pitchhub\.com/([^/]+)/public/player/([^/]+)~i', (string) $url));
    }

    public function getEndpoint()
    {
        preg_match('~https://(.+)\.pitchhub\.com~i', (string) $this->url, $matches);
        return str_replace('{subdomain}', $matches['1'], $this->endpoint);
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
