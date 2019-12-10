<?php
/**
 * TheySaidSo.php
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
 * TheySaidSo Provider
 * @link https://theysaidso.com
 */
class TheySaidSo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://theysaidso.com/extensions/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'theysaidso.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~theysaidso\.com/(i|image)/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (empty($response['html'])) {
            $html = [];

            $html[] = '<div class="theysaidso-html">';
            $html[] = '<a href="' . $response['url'] . '" title="">';
            $html[] = '<img src="' . $response['url'] . '" alt="" title="">';
            $html[] = '</a>';
            $html[] = '</div>';

            $response['html'] = implode('', $html);
        }

        return $response;
    }

}
