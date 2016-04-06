<?php
/**
 * TestServiceVevo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVevo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.vevo.com/watch/katy-perry/Firework/USCA31000112',
        ),
        'invalid' => array(
            'http://www.vevo.com',
        ),
    );

    /**
     * @large
     */
    public function testProvider()
    {
        $this->markTestIncomplete('My location doesnt allow me to make tests, since vevo.com is not available in my country');
        //$this->validateProvider('Vevo');
    }
}
?>
