<?php
/**
 * Infogram.php
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
 * The infogr.am Provider
 * @link https://infogr.am
 *
 * @TODO: This provider COULD support offline respones.
 */
class Infogram extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://infogr.am/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->invalidPattern('infogr\.am/(?:pricing|register|login|search|terms|privacy|featured|education|brands|organizations)$');

        return (preg_match('~infogr\.am/([^/ ]+)$~i', $this->url));
    }
}

?>
