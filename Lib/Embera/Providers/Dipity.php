<?php
/**
 * Dipity.php
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
 * The dipity.com Provider
 */
class Dipity extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.dipity.com/oembed/timeline/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~dipity\.com/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
