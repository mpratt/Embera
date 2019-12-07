<?php
/**
 * StandfordDigitalRepository.php
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
 * StandfordDigitalRepository Provider
 * @link https://purl.stanford.edu
 */
class StandfordDigitalRepository extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://purl.stanford.edu/embed.json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'purl.stanford.edu'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~stanford\.edu/([^/]+)~i', (string) $url));
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
        $embedUrl = 'https://embed.stanford.edu/iframe?url=' . $this->url;

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'height="{height}"';
        $attr[] = 'width="100%"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'marginwidth="0"';
        $attr[] = 'marginheight="0"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'allowfullscreen';

        return [
            'type' => 'rich',
            'provider_name' => 'StandfordDigitalRepository',
            'provider_url' => 'https://purl.stanford.edu',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
