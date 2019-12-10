<?php
/**
 * Playbuzz.php
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
 * The playbuzz.com Provider
 * @link http://playbuzz.com
 */
class Playbuzz extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://oembed.playbuzz.com/item?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~playbuzz\.com/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
