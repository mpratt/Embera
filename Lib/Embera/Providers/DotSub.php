<?php
/**
 * DotSub.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The dotsub.com Provider
 * @link http://dotsub.com/
 * @link http://dotsub.com/solutions/oEmbed
 */
class DotSub extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://dotsub.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~dotsub\.com/view/(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/(?:media|view)/([0-9a-f\-]+)~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://dotsub.com/view/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = str_replace('/view/', '/media/', $this->url);
        return array(
            'type' => 'video',
            'provider_name' => 'DotSUB',
            'provider_url' => 'http://dotsub.com',
            'thumbnail_url' => $url . '/t',
            'html' => '<iframe src="' . $url . '/e/c?width={width}&height={height}" frameborder="0" width="{width}" height="{height}"></iframe>',
        );
    }
}

?>
