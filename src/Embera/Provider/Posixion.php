<?php
/**
 * Posixion.php
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
 * Posixion Provider
 * @link https://posixion.com
 */
class Posixion extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://posixion.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'posixion.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~posixion\.com/question/([^/]+)$~i', (string) $url));
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
    public function getFakeResponse()
    {
        $embedUrl = str_replace('/question/', '/widget/question/', $this->url);

        $attr = [];
        $attr[] = 'width="100%"';
        $attr[] = 'height="100%"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Posixion',
            'provider_url' => 'https://posixion.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
