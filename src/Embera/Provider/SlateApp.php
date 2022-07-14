<?php
/**
 * SlateApp.php
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
 * SlateApp Provider
 *
 * @link https://*.slateapp.com
 */
class SlateApp extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://{username}.slateapp.com/api/v2/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.slateapp.com'
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
        return (bool) (preg_match('~slateapp\.com/work/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function getEndpoint()
    {
        if (preg_match('~//([^.]+)\.slateapp\.com/work~i', (string) $this->url, $m)) {
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
