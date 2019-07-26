<?php
/**
 * Speakerdeck.php
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
 * The speakerdeck.com Provider
 * @link http://speakerdeck.com
 */
class Speakerdeck extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://speakerdeck.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~speakerdeck\.com/([^/]{2,})/([^/]+)/?$~i', $this->url));
    }
}

