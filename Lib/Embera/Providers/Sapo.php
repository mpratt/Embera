<?php
/**
 * Sapo.php
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
 * The sapo.pt Provider
 * @link http://videos.sapo.pt
 */
class Sapo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://videos.sapo.pt/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~sapo\.pt/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        return array(
            'type' => 'video',
            'provider_name' => 'Sapo Videos',
            'provider_url' => 'http://videos.sapo.com',
            'html' => '<iframe src="http://videos.sapo.pt/playhtml?file=' . $this->url . '/mov/1&quality=sd" frameborder="0" scrolling="no" width="{width}" height="{height}"></iframe>',
        );
    }
}

?>
