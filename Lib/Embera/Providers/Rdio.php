<?php
/**
 * Rdio.php
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
 * The rdio.com rd.io Provider
 * @link http://developer.rdio.com/docs/oEmbed
 * @link http://rdio.com
 */
class Rdio extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.rdio.com/api/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~rd\.io/(?:[\w]+)/(?:[\w\d]+)/?$~i', $this->url) ||
                preg_match('~rdio\.com/artist/(?:[\d\w-_\+\%\./]+)/album/(?:.+)~i', $this->url) ||
                preg_match('~rdio\.com/people/(?:[\d\w-_\+\%\./]+)/playlists/(?:.+)~i', $this->url));
    }
}

?>
