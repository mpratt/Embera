<?php
/**
 * Avocode.php
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
 * Avocode Provider
 * Avocode helps you to centralize design collaboration, version control, prototyping, feedback, and developer hand-off.
 * Work on any design file, with anyone, on any platform. Sign up for a free trial today.
 *
 * This provider generates an html tag when none is available.
 *
 * @link https://avocode.com
 *
 */
class Avocode extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://stage-embed.avocode.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.avocode.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~avocode\.com/view/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (empty($response['html']) && isset($response['url'], $response['width'], $response['height'])) {
            $attr = [];
            $attr[] = 'width="' . $response['width'] . '"';
            $attr[] = 'height="' . $response['height'] . '"';
            $attr[] = 'src="' . $response['url'] . '"';
            $attr[] = 'frameborder="0"';
            $attr[] = 'allow="autoplay"';
            $attr[] = 'allowfullscreen';

            $response['html'] = '<iframe ' . implode(' ', $attr) . '></iframe>';
        }

        return $response;
    }

}
