<?php
/**
 * TestServiceIFixIt.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceIFixIt extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.ifixit.com/Guide/Replacing+iPad+4+CDMA+Logic+Board/16458',
            'http://www.ifixit.com/Guide/Repairing+IBM+ThinkPad+T41+BIOS+Battery/2916/1',
            'http://www.ifixit.com/Teardown/Plastic+Chair+Teardown/5989/1',
            'http://ifixit.com/Teardown/iPad+2+3G+GSM+%26+CDMA+Teardown/5127/1/',
            'http://www.ifixit.com/Teardown/AirPort+Extreme+A1521+Teardown/15044/',
        ),
        'invalid' => array(
            'http://www.ifixit.com/User/18/Walter+Galan',
            'http://www.ifixit.com/Guide',
            'http://www.ifixit.com/',
            'http://www.ifixit.com/Guide/login/register',
            'http://www.ifixit.com/Guide/login',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('IFixIt'); }
}
?>
