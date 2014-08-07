<?php
/**
 * TestServiceHq23.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceHq23 extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.23hq.com/brinjal/photo/13305971',
            'http://www.23hq.com/Dan-Tuyet/photo/13301964/',
            'http://23hq.com/gap_mike/photo/13287796',
            'http://www.23hq.com/Bo-Tina/photo/13259658',
            'http://www.23hq.com/euzmar/photo/13254262',
        ),
        'invalid' => array(
            'http://www.23hq.com/23/just-in?world=1&limit=70',
            'http://www.23hq.com/photogroup',
            'http://www.23hq.com/23/signup',
            'http://www.23hq.com/',
        ),
    );

    public function testProvider() { $this->validateProvider('Hq23'); }
}
?>
