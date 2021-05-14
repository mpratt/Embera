<?php
/**
 * SocialExplorer.php
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
 * SocialExplorer Provider
 * Social Explorer provides easy access to demographic information about the United States. We pro...
 *
 * @link https://socialexplorer.com
 *
 */
class SocialExplorer extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.socialexplorer.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'socialexplorer.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~socialexplorer\.com/([^/]+)/(explore|view|edit|embed)$~i', (string) $url));
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
        $embedUrl = str_replace(['/explore', '/view', '/edit'], '/embed', (string) $this->url);

        $attr = [];
        $attr[] = 'frameborder="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'marginheight="0"';
        $attr[] = 'marginwidth="0"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'allowfullscreen="true"';
        $attr[] = 'webkitallowfullscreen="true"';
        $attr[] = 'mozallowfullscreen="true"';

        return [
            'type' => 'rich',
            'provider_name' => 'SocialExplorer',
            'provider_url' => 'https://socialexplorer.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
