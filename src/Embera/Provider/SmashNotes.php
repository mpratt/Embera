<?php
/**
 * SmashNotes.php
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
 * SmashNotes Provider
 * Smash Notes is podcast summaries you can learn from. Can coffee kill you? What&#39;s the meanin...
 *
 * @link https://smashnotes.com
 *
 */
class SmashNotes extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://smashnotes.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'smashnotes.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~smashnotes\.com/p/([^/]+)~i', (string) $url) ||
            preg_match('~smashnotes\.com/p/([^/]+)/e/([^/]+)~i', (string) $url)
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
            $response['html'] = preg_replace('~title=\'(.+)\'~i', 'title=""', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = $this->url . '/embed/';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'title=""';

        return [
            'type' => 'rich',
            'provider_name' => 'SmashNotes',
            'provider_url' => 'https://smashnotes.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
