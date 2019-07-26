<?php
/**
 * TestServiceOfficialFM.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceOfficialFM extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://official.fm/playlists/cxBp?from=homepage&track_id=5dtD',
            'http://official.fm/playlists/Dztx',
            'http://official.fm/tracks/CLZo',
            'http://official.fm/tracks/2u3X',
            'http://official.fm/tracks/2eUw',
        ),
        'invalid' => array(
            'http://official.fm/login',
            'http://official.fm/join',
            'http://official.fm/',
            'http://official.fm/developers',
            'http://official.fm/privacy',
        ),
        'normalize' => array(
            'http://official.fm/playlists/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/playlists/Dztx',
            'http://www.official.fm/playlists/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/playlists/Dztx',
            'http://www.official.fm/playlists/Dztx' => 'http://official.fm/playlists/Dztx',
            'http://official.fm/tracks/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/tracks/Dztx',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('OfficialFM'); }
}
