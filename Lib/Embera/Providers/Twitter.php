<?php
/**
 * Twitter.php
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
 * The twitter.com Provider
 * @link https://twitter.com
 */
class Twitter extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.twitter.com/1/statuses/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~twitter\.com/(?:[\w\d-_]+)/status/(?:[0-9]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~twitter\.com/(?:\#\!|/)?([\w\d-_]+)/status/([0-9]+)~i', $this->url, $matches))
            $this->url = new \Embera\Url('https://twitter.com/' . $matches['1'] . '/status/' . $matches['2']);
    }
}

?>
