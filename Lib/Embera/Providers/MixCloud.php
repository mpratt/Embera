<?php
/**
 * MixCloud.php
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
 * The mixcloud.com Provider
 * @link http://www.mixcloud.com/developers/documentation/
 * @link http://www.mixcloud.com
 */
class MixCloud extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.mixcloud.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        // Urls with this words/pattern dont work
        $this->url->invalidPattern('mixcloud\.com/(?:categories|advertise|developers)/(?:[^/]+)/?$');

        return (preg_match('~mixcloud\.com/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
