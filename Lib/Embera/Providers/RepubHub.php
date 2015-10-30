<?php
/**
 * RepubHub.php
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
 * The http://repubhub.icopyright.net Provider
 */
class RepubHub extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://repubhub.icopyright.net/oembed.act?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~repubhub\.icopyright\.net/freePost.act\?([^ ]+)~i', $this->url));
    }
}

?>
