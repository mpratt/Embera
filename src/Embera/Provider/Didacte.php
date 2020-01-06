<?php
/**
 * Didacte.php
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
 * Didacte Provider
 * @link https://didacte.com
 */
class Didacte extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://{username}.didacte.com/cards/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.didacte.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        if (preg_match('~//([^.]+)\.didacte\.com/a/course/([^/]+)~i', (string) $url, $m)) {

            return !(strtolower($m['1']) == 'www');
        }

        return false;
    }

    /** inline {@inheritdoc} */
    public function getEndpoint()
    {
        if (preg_match('~//([^.]+)\.didacte\.com/a/course/([^/]+)~i', (string) $this->url, $m)) {
            $this->endpoint = str_replace('{username}', $m['1'], $this->endpoint);
        }

        return (string) $this->endpoint;
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
