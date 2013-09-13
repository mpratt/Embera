<?php
/**
 * CrowdRanking.php
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
 * The crowdranking.com Provider
 * @link crowdranking.com
 */
class CrowdRanking extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://crowdranking.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        return (preg_match('~crowdranking\.com/(?:crowdrankings|rankings|topics|widgets|r)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~c9ng\.com/r/([^/]+)/?$~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://crowdranking.com/r/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = preg_replace('~/(crowdrankings|rankings|topics|r)/~i', '/widgets/', $this->url);
        return array(
            'type' => 'rich',
            'provider_name' => 'crowdranking',
            'provider_url' => 'http://crowdranking.com',
            'web_page' => (string) $this->url,
            'html' => '<iframe src="' . $url . '.iframe?from=oembed&amp;frontmedia=true&amp;v=1" width="{width}" height="{height}" frameborder="0" scrolling="no" allowtransparency="true" style="border-style:none;width:{width}px;height:{height}px;background:transparent;overflow:hidden;"></iframe>',
        );
    }
}

?>
