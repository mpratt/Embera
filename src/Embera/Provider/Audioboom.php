<?php
/**
 * Audioboom.php
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
 * Audioboom Provider
 * Host, distribute and monetize your podcast with Audioboom.
 *
 * @link https://audioboom.com
 * @todo We could add fake responses for post urls but not for channels urls.
 *
 */
class Audioboom extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://audioboom.com/publishing/oembed/v4.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'audioboom.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~audioboom\.com/(channel|posts)/([^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }

}
