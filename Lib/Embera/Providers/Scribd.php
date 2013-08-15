<?php
/**
 * Scribd.php
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
 * The scribd.com Provider
 * TODO: Seems like this service could be a candidate for offline support
 */
class Scribd extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.scribd.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~scribd\.com/doc/(?:[0-9]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
