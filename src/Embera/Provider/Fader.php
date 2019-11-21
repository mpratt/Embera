<?php
/**
 * Fader.php
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
 * Fader Provider
 * @link https://app.getfader.com
 */
class Fader extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.getfader.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'app.getfader.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~app\.getfader\.com/projects/([^/]+)/publish/?$~i', (string) $url));
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
        $embedUrl = $this->url;
        // <iframe allowfullscreen="allowfullscreen" allowvr="allowvr" width=1200 height=600 src="https://app.getfader.com/projects/89a73dd0-4926-4f05-a9a8-6896a0a07a71/publish"></iframe>

        $attr = [];
        $attr[] = 'allowfullscreen="allowfullscreen"';
        $attr[] = 'allowvr="allowvr"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';

        return [
            'type' => 'rich',
            'provider_name' => 'Fader',
            'provider_url' => 'https://app.getfader.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
