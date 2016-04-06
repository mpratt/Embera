<?php
/**
 * Streamable.php
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
 * The Streamable Provider
 * @link https://streamable.com/
 */
class Streamable extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.streamable.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->invalidPattern('streamable\.com/(login|signin|about|tools|terms|privacy)');
        return (preg_match('~streamable\.com/(:?[^ ]+)/?$~i', $this->url));
    }
}

?>
