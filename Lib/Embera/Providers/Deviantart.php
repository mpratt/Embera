<?php
/**
 * Deviantart.php
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
 * The deviantart.com Provider
 */
class Deviantart extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://backend.deviantart.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~(deviantart\.com/art/(?:[^/]+)|(?:sta\.sh|fav\.me)/([^/]+))/?$~i', $this->url));
    }
}

?>
