<?php
/**
 * TestServiceDipity.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDipity extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            //'http://www.dipity.com/BIRN/Albania-Local-Elections-2011/',
            'http://www.dipity.com/StevePro/Skype-from-startup-to-8-5-billion-sale',
            'http://www.dipity.com/ibmzrl/Nanotechnology-at-IBM-Research/',
            'http://dipity.com/StevePro/2010-in-Review/',
            'http://www.dipity.com/timeline/Nba-Finals/',
        ),
        'invalid' => array(
            'http://www.dipity.com/timeline/Nba-Finals/other/stuff',
            'http://www.dipity.com/',
            'http://www.dipity.com/premium',
            'http://www.dipity.com/timetube',
            'http://www.dipity.com/join',
        ),
        'normalize' => array(
            'http://dipity.com/StevePro/2010-in-Review/' => 'http://dipity.com/StevePro/2010-in-Review/',
            'http://dipity.com/StevePro/2010-in-Review/?cuaccuac=cuac' => 'http://dipity.com/StevePro/2010-in-Review/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Dipity'); }
}
?>
