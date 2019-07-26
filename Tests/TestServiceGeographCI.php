<?php
/**
 * TestServiceGeographCI.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGeographCI extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://channel-islands.geographs.org/photo/1166',
            'http://channel-islands.geographs.org/photo/952',
            'http://channel-islands.geographs.org/photo/1231',
            'http://channel-islands.geographs.org.je/photo/961',
            'http://channel-islands.geographs.org.gg/photo/984',
            'http://channel-islands.geographs.org/photo/656',
        ),
        'invalid' => array(
            'http://channel-islands.geographs.org/discuss/',
            'http://channel-islands.geographs.org/submit.php',
            'http://channel-islands.geographs.org/submit.php',
            'http://channel-islands.geographs.org/list.php',
        ),
    );

    public function testProvider() { $this->validateProvider('GeographCI'); }
}
