<?php
/**
 * iFixit.php
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
 * iFixit Provider
 * @link https://ifixit.com
 */
class iFixit extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.ifixit.com/Embed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ifixit.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ifixit\.com/(?:Guide|Teardown)/(?:[^/]+)/(?:[^/]+)$~i', (string) $url));
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
        preg_match('~/(\d{4,20})$~', (string) $this->url, $matches);

        $mode = 'Guide';
        if (stripos($this->url, 'Teardown') !== false) {
            $mode = 'Teardown';
        }

        $embedUrl = 'https://www.ifixit.com/' . $mode . '/embed/'.$matches[1];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'allowfullscreen';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'iFixit',
            'provider_url' => 'https://ifixit.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
