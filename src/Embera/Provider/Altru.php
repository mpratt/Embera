<?php
/**
 * Altru.php
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
 * altrulabs.com Provider
 *
 * @link https://app.altrulabs.com
 *
 */
class Altru extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.altrulabs.com/api/v1/social/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'app.altrulabs.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~\.com/(?:[^/]+)/(?:[^/]+)/?\?answer_id=(?:[0-9]+)~i', (string) $url) ||
            preg_match('~\.com/player/([0-9]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = '';
        if (preg_match('~answer_id=([0-9]+)~i', (string) $this->url, $matches)) {
            $embedUrl = 'https://api.altrulabs.com/api/v1/social/embed_player/' . $matches['1'];
        } else if (preg_match('~/player/([0-9]+)~i', (string) $this->url, $matches)) {
            $embedUrl = 'https://api.altrulabs.com/api/v1/social/embed_player/' . $matches['1'];
        }

        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'allow="autoplay; encrypted-media"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'video',
            'provider_name' => 'Altru',
            'provider_url' => 'https://www.altrulabs.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
