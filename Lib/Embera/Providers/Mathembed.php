<?php
/**
 * Mathembed.php
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
 * The mathembed.com Provider
 * @link http://www.mathembed.com
 * @TODO: Might support fake response
 */
class Mathembed extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://mathembed.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        $this->url->stripWWW();

        return preg_match('~/latex\?inputText=(?:[^ ]+)$~i', $this->url);
    }
}

?>
