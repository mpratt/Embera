<?php
/**
 * Polldaddy.php
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
 * Polldaddy Provider
 * Crowdsignal
 */
class Polldaddy extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.crowdsignal.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.poll.fm',
        '*.survey.fm',
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~polldaddy\.com/(?:poll|s|ratings)/(?:[^/]+)/?$~i', (string) $url) ||
            preg_match('~(?:poll|survey)\.fm/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}
