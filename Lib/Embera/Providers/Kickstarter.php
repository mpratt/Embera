<?php
/**
 * Kickstarter.php
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
 * The kickstarter.com Provider
 * @link http://www.kickstarter.com
 */
class Kickstarter extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.kickstarter.com/services/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->addWWW();

        return (preg_match('~/projects/(?:[^/]+)/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        return array(
            'type' => 'rich',
            'provider_name' => 'Kickstarter',
            'provider_url' => 'http://www.kickstarter.com',
            'html' => '<iframe frameborder="0" height="{height}" src="' . $this->url . '/widget/video.html" width="{width}"></iframe>',
        );
    }
}

?>
