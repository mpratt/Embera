<?php
/**
 * TestServiceMyOpera.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceMyOpera extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://my.opera.com/cstrep/avatar.pl',
            'http://my.opera.com/cstrep/albums/showpic.dml?album=504322&picture=6964560',
            'http://my.opera.com/chooseopera/albums/show.dml?id=12909671',
            'http://my.opera.com/chooseopera/albums/showpic.dml?album=12909671&picture=168425501',
            'http://my.opera.com/chooseopera/albums/show.dml?id=9363632',
            'http://my.opera.com/chooseopera/albums/showpic.dml?album=9363632&picture=128991402',
            'http://my.opera.com/Aleksander/avatar.pl',
        ),
        'invalid' => array(
            'http://my.opera.com/avatar.pl',
            'http://my.opera.com/chooseopera/albums/show.dml',
            'http://my.opera.com/chooseopera/albums/showpic.dml?picture=128991482&album=9363632', // Order matters
            'http://my.opera.com/chooseopera/albums/showpic.dml?noise=12909671',
            'http://my.opera.com/chooseopera/albums/showStuff.dml?id=9363632',
            'http://my.opera.com/chooseopera/invalid/showpic.dml?picture=128991482&album=9363632&noise=yes',
            'http://my.opera.com/Aleksander/avatar/',
        )
    );

    public function testProvider() { $this->validateProvider('MyOpera'); }
}
?>
