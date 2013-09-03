<?php
/**
 * Bambuser.php
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
 * The bambuser.com Provider
 * @link http://bambuser.com/api/embed_oembed
 */
class Bambuser extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.bambuser.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~bambuser\.com/channel/(?:[^/]+)/broadcast/(?:[^/]+)$~i', $this->url) ||
                preg_match('~bambuser\.com/channel/(?:[^/]+)$~i', $this->url) ||
                preg_match('~bambuser\.com/v/(?:[0-9]+)$~i', $this->url)  );
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = preg_replace('~(?://www\.)~i', '//', rtrim($this->url, '/'));
    }
}

?>
