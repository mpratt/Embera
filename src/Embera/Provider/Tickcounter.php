<?php
/**
 * Tickcounter.php
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
 * Tickcounter Provider
 * No description.
 *
 * @link https://tickcounter.com
 *
 */
class Tickcounter extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.tickcounter.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'tickcounter.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~tickcounter\.com/(countdown|countup|ticker|worldclock|widget|clock)/([^/]+)~i', (string) $url));
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
            $response['html'] = preg_replace('~title="(.+)"~i', 'title=""', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~(countdown|countup|ticker|worldclock)/([^/]+)~', (string) $this->url, $m);
        $embedUrl = 'https://www.tickcounter.com/widget/' . $m['1'] . '/' . $m['2'];

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'style="top:0; left:0; width:100%; height:100%; position:absolute; border:0; overflow:hidden';
        $attr[] = 'title=""';

        return [
            'type' => 'rich',
            'provider_name' => 'Tickcounter',
            'provider_url' => 'https://tickcounter.com',
            'title' => 'Unknown title',
            'html' => '<div style="left:0; width:500px; height:125px; position:relative; padding-bottom:0; margin:0 auto"><iframe ' . implode(' ', $attr). '></iframe></div>',
        ];
    }

}
