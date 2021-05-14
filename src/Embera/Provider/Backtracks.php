<?php
/**
 * Backtracks.php
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
 * Backtracks Provider
 * Backtracks is the world's most advanced podcast analytics and advertising platform.
 * Know and grow your audience and revenue.
 *
 * @link https://backtracks.fm
 * @todo It seems as it could support fake responses but we dont have enough data to test.
 *
 */
class Backtracks extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://backtracks.fm/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'backtracks.fm'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~backtracks\.fm/(?:[^/]+)/(?:[^/]+)/e/(?:[^/]+)/?$~i', (string) $url) ||
            preg_match('~backtracks\.fm/(?:[^/]+)/s/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url) ||
            preg_match('~backtracks\.fm/(?:[^/]+)/(?:[^/]+)/(?:[^/]+)/(?:[^/]+)/e/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }

}
