<?php
/**
 * Twitch.php
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
 * The Twitch Provider
 * @link https://github.com/justintv/Twitch-API/blob/master/embed-video.md
 */
class Twitch extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.twitch.tv/v4/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        return (preg_match('~twitch\.tv/videos/(?:[^ ]+)~i', $this->url) || preg_match('~twitch\.tv/(?:[^/]+)/v/(?:[^ ]+)~i', $this->url));
    }
}

?>
