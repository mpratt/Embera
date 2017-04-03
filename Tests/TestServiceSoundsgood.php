<?php
/**
 * TestServiceSoundsgood.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSoundsgood extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://play.soundsgood.co/playlist/hestia',
        ),
        'invalid' => array(
            'https://play.soundsgood.co/',
        ),
    );

    public function testProvider() { $this->validateProvider('Soundsgood'); }
}
?>
