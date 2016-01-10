<?php
/**
 * Showtheway.php
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
 * The Showtheway Provider
 * @link https://showtheway.io/
 */
class Showtheway extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://showtheway.io/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->convertToHttps();

        return (preg_match('~showtheway\.io/to/(?:[^/]+)$~i', $this->url));
    }
}

?>
