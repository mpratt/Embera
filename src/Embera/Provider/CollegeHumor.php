<?php
/**
 * CollegeHumor.php
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
 * CollegeHumor Provider
 * @link https://collegehumor.com
 */
class CollegeHumor extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.collegehumor.com/oembed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'collegehumor.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~collegehumor\.com/(?:video|embed)/(?:[0-9]{5,10})/?~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->addWWW();
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = str_replace(['/video/', '/embed/'], '/e/', $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'webkitAllowFullScreen allowFullScreen';

        return [
            'type' => 'video',
            'provider_name' => 'CollegeHumor',
            'provider_url' => 'http://www.collegehumor.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
