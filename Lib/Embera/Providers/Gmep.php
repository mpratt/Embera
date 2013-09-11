<?php
/**
 * Gmep.php
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
 * The gmep.org Provider
 */
class Gmep extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://gmep.org/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->convertToHttps();
        $this->url->stripWWW();

        return (preg_match('~gmep\.org/media/(?:[0-9]+)$~i', $this->url));
    }
}

?>
