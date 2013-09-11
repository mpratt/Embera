<?php
/**
 * BlipTV.php
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
 * The blip.tv Provider
 * @link http://blip.tv
 */
class BlipTV extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://blip.tv/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~blip\.tv/(?:[^/]+)/(?:[^/]+)-([0-9]+)/?$~i', $this->url));
    }
}

?>
