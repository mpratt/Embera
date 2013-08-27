<?php
/**
 * FunnyOrDie.php
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
 * The funnyordie.com Provider
 */
class FunnyOrDie extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.funnyordie.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~funnyordie\.com/videos/(?:[\w\d]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
