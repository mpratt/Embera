<?php
/**
 * Revision3.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Revision3 extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://revision3.com/api/oembed/?format=json';

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~revision3\.com/([^/]+)/([^/]+)/?~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        // urls with network/host are not valid, strip that out for validation
        if (preg_match('~revision3\.com/(network|host|advertise)/~i', $this->url))
            $this->url = 'http://revision3.com/';
    }
}

?>
