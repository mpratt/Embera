<?php
/**
 * TestServiceShoudio.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceShoudio extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://shoudio.com/user/sowa',
            'http://www.shoudio.com/user/shoister/',
            'http://shoudio.com/user/sowa/status/8171',
            'http://shoudio.com/user/sowa/status/8169',
            'http://shoudio.com/channel/streetmusic',
            'http://shoudio.com/venue/1246/hemlock-tavern.html',
            'http://shoudio.com/venue/1240/park-g-ell.html',
            'http://touch.shoud.io/3862',
        ),
        'invalid' => array(
            'http://shoudio.com/signup',
            'http://shoudio.com',
            'http://touch.shoud.io/3862/other-stuff',
            'http://shoudio.com/collections',
            'http://shoudio.com/venues',
        ),
        'normalize' => array(
            'http://shoudio.com/user/sowa/status/8169' => 'http://shoudio.com/user/sowa/status/8169',
            'http://www.shoudio.com/user/sowa/status/8169' => 'http://shoudio.com/user/sowa/status/8169',
            'http://shoudio.com/user/sowa/status/8169/' => 'http://shoudio.com/user/sowa/status/8169',
        )
    );

    public function testProvider() { $this->validateProvider('Shoudio'); }
}
?>
