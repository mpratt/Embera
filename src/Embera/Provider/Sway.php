<?php
/**
 * Sway.php
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
 * Sway Provider
 * Create and share interactive reports, presentations, personal stories, and more. Sway is an eas...
 *
 * @link https://sway.com
 *
 */
class Sway extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://sway.com/api/v1.0/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'sway.office.com', 'sway.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~sway\.(office\.)?com/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->setHost('sway.com');
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace('sway.com/', 'sway.com/s/', $this->url) . '/embed';

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'marginwidth="0"';
        $attr[] = 'max-width="100%"';
        $attr[] = 'sandbox="allow-forms allow-modals allow-orientation-lock allow-popups allow-same-origin allow-scripts"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'style="border: none; max-width: 100%; max-height: 100vh"';
        $attr[] = 'allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'Sway',
            'provider_url' => 'https://sway.office.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
