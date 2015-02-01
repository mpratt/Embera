<?php
/**
 * Portfolium.php
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
 * The portfolium.com Provider
 * @link https://api.portfolium.com/#!/oembed/oembed_index_get
 * @link https://portfolium.com
 */
class Portfolium extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.portfolium.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~portfolium\.com\/entry\/(?:[^ /]+)$~i', $this->url));
    }
}

?>
