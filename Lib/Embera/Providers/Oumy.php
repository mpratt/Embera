<?php
/**
 * Oumy.php
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
 * The Oumy Provider
 * @link https://oumy.com
 */
class Oumy extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.oumy.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        return (preg_match('~oumy\.com/v/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/v/([^/]+)$~i', $this->url, $m);

        return array(
            'type' => 'video',
            'provider_name' => 'Oumy',
            'provider_url' => 'https://www.oumy.com',
            'html' => '<iframe src="https://www.oumy.com/embed/' . $m['1'] . '" width="{width}" height="{height}" scrolling="no" frameborder="1" style="border: 1px solid black;" allowfullscreen /> '
        );
    }
}

?>
