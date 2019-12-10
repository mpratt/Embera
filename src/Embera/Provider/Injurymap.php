<?php
/**
 * Injurymap.php
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
 * Injurymap Provider
 * @link https://injurymap.com
 */
class Injurymap extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.injurymap.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'injurymap.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~injurymap\.com/exercises/([^/]+)$~i', (string) $url));
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
        $embedUrl = str_replace('/excercises/', '/embed/excercise/', (string) $this->url);

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'allowfullscreen="true"';
        $attr[] = 'webkitallowfullscreen="true"';
        $attr[] = 'mozallowfullscreen="0"';
        $attr[] = 'frameborder="0"';

        return [
            'type' => 'video',
            'provider_name' => 'Injurymap',
            'provider_url' => 'https://injurymap.com',
            'title' => 'Unknown title',
            'html' => '<iframe ' . implode(' ', $attr). '></iframe>',
        ];
    }

}
