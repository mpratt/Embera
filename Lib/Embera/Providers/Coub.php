<?php
/**
 * Coub.php
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
 * The coub.com Provider
 * @link http://coub.com
 */
class Coub extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://coub.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        return (preg_match('~coub\.com/(?:view|embed)/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/([\w\d]+)$~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Coub',
            'provider_url' => 'http://coub.com',
            'url' => (string) $this->url,
            'html' => '<iframe src="http://coub.com/embed/' . $matches['1'] . '" allowfullscreen="true" frameborder="0" width="{width}" height="{height}"></iframe>',
        );
    }
}

?>
