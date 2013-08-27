<?php
/**
 * WordpressTV.php
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
 * The wordpress.tv Provider
 */
class WordpressTV extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://public-api.wordpress.com/oembed/1.0/?format=json&for=wpcom-auto-discovery';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~wordpress\.tv/(?:[0-9]+)/(?:[0-9]+)/(?:[0-9]+)/(?:[^/]+)/?$~i', $this->url));
    }
}

?>
