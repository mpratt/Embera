<?php
/**
 * OfficialFM.php
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
 * The official.fm Provider
 */
class OfficialFM extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://official.fm/services/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~official\.fm/(?:tracks|playlists)/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = preg_replace('~\?(.*)$~i', '', $this->url);
        $this->url = str_ireplace('//www.official.fm', '//official.fm', rtrim($this->url, '/'));
    }
}

?>
