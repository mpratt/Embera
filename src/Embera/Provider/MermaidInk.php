<?php
/**
 * MermaidInk.php
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
 * MermaidInk Provider
 * @link https://mermaid.ink
 */
class MermaidInk extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://mermaid.ink/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'mermaid.ink'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~mermaid\.ink/(img|svg)/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {

        if (empty($response['html']) && !empty($response['url'])) {
            $response['html'] = '<img src="' . $response['url'] . '" alt="" title="" >';
        }

        return $response;
    }

}
