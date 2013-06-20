<?php
/**
 * Revision3.php
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
 * The Revision3.com Provider
 */
class Revision3 extends \Embera\Adapters\Service
{

    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://revision3.com/api/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~revision3\.com/([^/]+)/([^/]+)/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        // urls with network/host are not valid, strip that out for validation
        if (preg_match('~revision3\.com/(network|host|advertise)/~i', $this->url))
            $this->url = 'http://revision3.com/';
    }
}

?>
