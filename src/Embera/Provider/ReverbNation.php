<?php
/**
 * ReverbNation.php
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
 * ReverbNation Provider
 * @link https://reverbnation.com
 */
class ReverbNation extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.reverbnation.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'reverbnation.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        if (preg_match('~reverbnation\.com/(main/|band-promotion|opportunities_list|pricing|signup)/?~i', (string) $url)) {
            return false;
        }

        return (bool) (
            preg_match('~reverbnation\.com/([^/]+)$~i', (string) $url) ||
            preg_match('~reverbnation\.com/([^/]+)/song/([^/]+)~i', (string) $url)
        );
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
