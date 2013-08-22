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
 */
class MixCloud extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.mixcloud.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~mixcloud\.com/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        // Urls with this words are not allowd
        if (preg_match('~mixcloud\.com/(?:categories|advertise|developers)/(?:[^/]+)/?$~i', $this->url))
            $this->url = 'http://www.mixcloud.com/';
    }
}

?>
