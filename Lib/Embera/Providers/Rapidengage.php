<?php
/**
 * Rapidengage.php
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
 * The rapidengage.com Provider
 * @link https://rapidengage.com
 * @link https://rapidengage.com/developer/docs#oembed
 */
class Rapidengage extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://rapidengage.com/api/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();
        $this->url->convertToHttps();

        return (preg_match('~rapidengage\.com/s/(?:[^ /]+)$~i', $this->url));
    }
}

?>
