<?php
/**
 * Screenr.php
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
 * The screenr.com Provider
 */
class Screenr extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.screenr.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~screenr\.com/(?:[\w\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = rtrim($this->url, '/');
        if (preg_match('~screenr\.com/(?:record|stream|terms|privacy|help)/?$~i', $this->url))
            $this->url = 'http://www.screenr.com';
    }
}

?>
