<?php
/**
 * TwentyThreeHq.php
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
 * 23hq.com Provider
 *
 * 23 is easy photo sharing. Share private or public with photo albums, tags, storage,
 * slideshow, photoblog, subscriptions, send photos and much more
 * This provider generates html tags for single pictures.
 *
 * @link http://www.23hq.com
 *
 */
class TwentyThreeHq extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://www.23hq.com/23/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '23hq.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~23hq\.com/([^/]+)/(photo|album)/([^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->removeQueryString();
        $url->removeLastSlash();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (!isset($response['html']) && isset($response['type']) && $response['type'] == 'photo') {
            $response['html'] = '<div class="embera-photo"><img src="' . $response['url'] . '" alt="" style="width:' . $response['width'] . 'px;" title="" /></div>';
        }

        return $response;
    }

}
