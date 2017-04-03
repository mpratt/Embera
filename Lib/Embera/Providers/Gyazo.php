<?php
/**
 * Gyazo.php
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
 * The Gyazo Provider
 * @link https://gyazo.com/api/docs/image#oembed
 */
class Gyazo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.gyazo.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        return (preg_match('~/(?:[0-9a-z]{32,64})~i', $this->url));
    }
}

?>
