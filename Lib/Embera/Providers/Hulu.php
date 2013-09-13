<?php
/**
 * Hulu.php
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
 * The Hulu.com Provider
 * @link http://hulu.com
 */
class Hulu extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.hulu.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->addWWW();

        return (preg_match('~hulu\.com/watch/([0-9]{4,10})~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/watch/([0-9]{4,10})~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://www.hulu.com/watch/' . $matches['1']);
    }
}

?>
