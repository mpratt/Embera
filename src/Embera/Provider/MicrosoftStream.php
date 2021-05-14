<?php
/**
 * MicrosoftStream.php
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
 * MicrosoftStream Provider
 * No description.
 *
 * @link https://web.microsoftstream.com/
 * @see https://docs.microsoft.com/en-us/stream/embed-video-oembed
 */
class MicrosoftStream extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://web.microsoftstream.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.microsoftstream.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'width', 'height', 'autoplay', 'preload', 'st' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~microsoftstream\.com/(video|channel)/([^/]+)~i', (string) $url));
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
