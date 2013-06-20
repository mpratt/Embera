<?php
/**
 * Hulu.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Hulu extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://www.hulu.com/api/oembed.json';

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~hulu\.com/watch/([0-9]{4,10})/?~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~hulu\.com/watch/([0-9]{4,10})/?~i', $this->url, $m))
            $this->url = 'http://www.hulu.com/watch/' . $m['1'];
    }
}

?>
