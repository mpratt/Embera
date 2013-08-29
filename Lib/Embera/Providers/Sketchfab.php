<?php
/**
 * Sketchfab.php
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
 * The sketchfab.com Provider
 */
class Sketchfab extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://sketchfab.com/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~sketchfab\.com/show/(?:[\w\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = str_ireplace('//www.', '//', rtrim($this->url, '/'));
    }
}

?>
