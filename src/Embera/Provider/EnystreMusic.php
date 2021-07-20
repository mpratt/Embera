<?php
/**
 * EnystreMusic.php
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
 * EnystreMusic Provider
 * Cherche parmi notre catalogue les paroles des chansons chrétiennes du monde entier.
 *
 * @link https://music.enystre.com
 * @see https://www.notion.so/oEmbed-ad1360b80d9c459b85e026cf99761c70
 * @todo Might support fake responses
 */
class EnystreMusic extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://music.enystre.com/oembed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'music.enystre.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~music\.enystre\.com/lyrics/([^/]+)~i', (string) $url));
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
