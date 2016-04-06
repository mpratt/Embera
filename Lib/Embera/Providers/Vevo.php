<?php
/**
 * Vevo.php
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
 * The vevo.com Provider
 * @link https://vevo.com
 */
class Vevo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.vevo.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~vevo\.com/watch/(?:[^ ]+)/?$~i', $this->url));
    }
}

?>
