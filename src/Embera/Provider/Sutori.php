<?php
/**
 * Sutori.php
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
 * Sutori Provider
 * Presentations for the classroom in a unique timeline format. On Sutori, teachers and students c...
 *
 * @link https://sutori.com
 *
 */
class Sutori extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.sutori.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'sutori.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~sutori\.com/story/([^/]+)~i', (string) $url));
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
        $embedUrl = $this->url . '/embed';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="100%"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Sutori',
            'provider_url' => 'https://sutori.com',
            'title' => 'Unknown title',
            'html' => '<script src="https://assets.sutori.com/frontend-assets/assets/iframeResizer.js"></script><iframe ' . implode(' ', $attr). '></iframe><script src="https://assets.sutori.com/frontend-assets/assets/iframeResizer.executer.js"></script>',
        ];
    }

}
