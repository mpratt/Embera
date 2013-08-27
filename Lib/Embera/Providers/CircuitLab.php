<?php
/**
 * CircuitLab.php
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
 * The circuitlab.com Provider
 */
class CircuitLab extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.circuitlab.com/circuit/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~circuitlab\.com/circuit/(?:[\w\d]+)/([^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = str_ireplace('//circuitlab.com', '//www.circuitlab.com', $this->url);
    }
}

?>
