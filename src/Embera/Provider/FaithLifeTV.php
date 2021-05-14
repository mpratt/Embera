<?php
/**
 * FaithLifeTV.php
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
 * FaithLifeTV Provider
 * Enjoy thousands of hours of Christian movies, shows, and biblical teaching on Faithlife TV.
 *
 * @link https://faithlifetv.com
 */
class FaithLifeTV extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://faithlifetv.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'faithlifetv.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            (preg_match('~faithlifetv\.com/(items|media)/([^/]+)$~i', (string) $url)) ||
            (preg_match('~faithlifetv\.com/(items/resource|media/resource)/([^/]+)/([^/]+)$~i', (string) $url)) ||
            (preg_match('~faithlifetv\.com/media/assets/([^/]+)$~i', (string) $url))
        );
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
        if (!empty($response['html'])) {

            // Backup the real response
            $response['html_original'] = $response['html'];

            // In order to pass fake response tests, we need to delete the contents of the title in the iframe
            $response['html'] = preg_replace('~title="(.+)"~', 'title="', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = $this->url . '?embedded=1&amp;autoplay=0';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'title=""';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'FaithLifeTV',
            'provider_url' => 'https://faithlifetv.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
