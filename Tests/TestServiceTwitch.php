<?php
/**
 * TestServiceTwitch.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceTwitch extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.twitch.tv/riotgames/v/72749628',
            'https://twitch.tv/videos/72749628',
        ),
        'invalid' => array(
            'https://www.twitch.tv/',
            'https://www.twitch.tv/login',
        ),
    );

    public function testProvider() { $this->validateProvider('Twitch'); }
}
?>
