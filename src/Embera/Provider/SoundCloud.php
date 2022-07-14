<?php
/**
 * SoundCloud.php
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
 * SoundCloud Provider
 * SoundCloud is a music and podcast streaming platform that lets you listen to millions of songs ...
 *
 * @link https://soundcloud.com
 *
 */
class SoundCloud extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://soundcloud.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'soundcloud.com',
        'api.soundcloud.com',
        'on.soundcloud.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            !preg_match('~soundcloud\.com/(discover|stream|upload|popular|charts|people|pages|imprint|you)~i', (string) $url) &&
            preg_match('~soundcloud\.com/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeLastSlash();

        return $url;
    }

}
