<?php
/**
 * Huffduffer.php
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
 * The huffduffer.com Provider
 * @link http://huffduffer.com
 */
class Huffduffer extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://huffduffer.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~huffduffer\.com/(?:[^/]+)/(?:[0-9]+)/?$~i', $this->url));
    }
}

?>
