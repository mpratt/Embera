<?php
/**
 * Knacki.info.php
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
 * Knacki.info Provider
 * @link https://jdr.knacki.info
 */
class Knacki extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://jdr.knacki.info/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'jdr.knacki.info'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~jdr\.knacki\.info/meuh/([^/]+)~i', (string) $url));
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
        $embedUrl = $this->url . '?embed';

        $attr = [];
        $attr[] = 'width="100%"';
        $attr[] = 'height="{height}"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Knacki.info',
            'provider_url' => 'https://jdr.knacki.info',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
