<?php
/**
 * TestServiceHulu.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceHulu extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008',
            'http://hulu.com/watch/501126',
            'http://www.hulu.com/watch/440265/',
            'http://hulu.com/watch/476621',
            'http://www.hulu.com/watch/331822/stuff/here',
            'http://www.hulu.com/watch/416223?playlist_id=1787&asset_scope=movies',
            'http://hulu.com/watch/493032/'
        ),
        'invalid' => array(
            'http://www.hulu.com/stuff/440265',
            'http://www.hulu.com/watch/abduej/2344657', // Not numeric
            'http://hulu.com/450265',
            'http://www.hulu.com/watch/44ui65/'
        ),
        'normalize' => array(
            'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008' => 'http://www.hulu.com/watch/20807',
            'http://www.hulu.com/watch/440265/' => 'http://www.hulu.com/watch/440265',
            'http://www.hulu.com/watch/416223?playlist_id=1787&asset_scope=movies' => 'http://www.hulu.com/watch/416223',
            'http://hulu.com/watch/331822/stuff/here' => 'http://www.hulu.com/watch/331822',
            'http://hulu.com/watch/501126' => 'http://www.hulu.com/watch/501126',
        )
    );

    public function testProvider() { $this->validateProvider('Hulu'); }
}
?>
