<?php
/**
 * Cacoo.php
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
 * The cacoo.com Provider
 * @link https://cacoo.com/lang/en/api_oembed
 */
class Cacoo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://cacoo.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~cacoo\.com/diagrams/(?:[\w\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = str_ireplace('//www.', '//', rtrim($this->url, '/'));
    }
}

?>
