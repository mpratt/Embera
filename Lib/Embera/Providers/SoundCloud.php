<?php
/**
 * SoundCloud.php
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
 * The soundcloud.com Provider
 * @link http://soundcloud.com
 */
class SoundCloud extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://soundcloud.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->invalidPattern('soundcloud\.com/(explore|creators|groups)/?$');

        return (preg_match('~soundcloud\.com/(?:[\w\d\-_]+)~i', $this->url));
    }
}

?>
