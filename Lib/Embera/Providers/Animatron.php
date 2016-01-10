<?php
/**
 * Animatron.php
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
 * The Animatron Provider
 * @link https://www.animatron.com/
 */
class Animatron extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.animatron.com/oembed/json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();
        $this->url->convertToHttps();

        return (preg_match('~animatron\.com/project/(?:[^/]+)$~i', $this->url));
    }
}

?>
