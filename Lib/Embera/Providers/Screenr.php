<?php
/**
 * Screenr.php
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
 * The screenr.com Provider
 * @link http://screenr.com
 */
class Screenr extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.screenr.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->invalidPattern('screenr\.com/(?:record|stream|terms|privacy|help)$');

        return (preg_match('~screenr\.com/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/([\w\d]+)$~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Screenr',
            'provider_url' => 'http://screenr.com',
            'html' => '<iframe src="http://www.screenr.com/embed/' . $matches['1'] . '" width="{width}" height="{height}" frameborder="0"></iframe>',
        );
    }
}

?>
