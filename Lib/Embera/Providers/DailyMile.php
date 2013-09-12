<?php
/**
 * DailyMile.php
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
 * The dailymile.com Provider
 * @link http://www.dailymile.com
 * @link http://www.dailymile.com/api/oembed
 */
class DailyMile extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.dailymile.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/people/(?:[^/]+)/entries/(?:[0-9]+)/?$~i', $this->url));
    }
}

?>
