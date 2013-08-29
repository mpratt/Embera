<?php
/**
 * MobyPicture.php
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
 * The mobypicture.com Provider
 */
class MobyPicture extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.mobypicture.com/oEmbed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~mobypicture\.com/user/(?:[^/]+)/view/(?:[0-9]+)/?$~i', $this->url) ||
                preg_match('~moby\.to/(?:[\w\d]+)$~', $this->url));
    }
}

?>
