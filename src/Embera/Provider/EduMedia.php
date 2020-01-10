<?php
/**
 * EduMedia.php
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
 * EduMedia Provider
 * @link https://www.edumedia-sciences.com
 */
class EduMedia extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.edumedia-sciences.com/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'edumedia-sciences.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~edumedia-sciences\.com/(?:[a-z]{2})/media/([0-9]+)(?:-(?:[^/]+))?$~i', (string) $url));
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
        preg_match('~edumedia-sciences\.com/([a-z]{2})/media/([0-9]+)~i', (string) $this->url, $m);

        $embedUrl = 'https://www.edumedia-sciences.com/' . $m['1']. '/media/frame/' . $m['2'] . '/';

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'rich',
            'provider_name' => 'EduMedia',
            'provider_url' => 'https://www.edumedia-sciences.com',
            'thumbnail_url' => 'https://www.edumedia-sciences.com/media/thumbnail/' . $m['2'],
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
