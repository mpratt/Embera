<?php
/**
 * TestServiceSpotify.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSpotify extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://play.spotify.com/album/4YQsbhCYkpmueqKC4aEn7f/0FHTJAMXhBhEnoEiMwxzO1',
            'https://play.spotify.com/album/4FCuyUjOkT28PnFo6A6vkf/4K4sc36DCTp9YJNVu5zV09',
            'https://play.spotify.com/track/0Wm3w3YiMe7YiS8erpKbOl',
            'https://play.spotify.com/album/2r4a3PREYIRF2QdbcPnrEO/4wsxtmLm89JBwWWAMKLxf2',
            'https://play.spotify.com/track/5DutiJxznQmcV5a5a1zfRW',
            'https://play.spotify.com/user/spotifycolombia/playlist/3zIzQMHvOlw3ukDhRKR2jO',
        ),
        'invalid' => array(
            'https://play.spotify.com/stuff/3zIzQMHvOlw3ukDhRKR2jO',
        ),
        'normalize' => array(
            'https://play.spotify.com/album/4YQsbhCYkpmueqKC4aEn7f/0FHTJAMXhBhEnoEiMwxzO1' => 'https://play.spotify.com/album/4YQsbhCYkpmueqKC4aEn7f',
            'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f/0FHTJAMXhBhEnoEiMwxzO1' => 'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f',
            'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f/' => 'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f',
            'https://play.spotify.com/album/4YQsbhCYkpmueqKC4aEn7f/' => 'https://play.spotify.com/album/4YQsbhCYkpmueqKC4aEn7f',
            'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f' => 'https://play.spotify.com/track/4YQsbhCYkpmueqKC4aEn7f',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    /**
     * @large
     */
    public function testProvider()
    {
        $this->validateProvider('Spotify');
    }
}
