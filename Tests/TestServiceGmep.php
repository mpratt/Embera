<?php
/**
 * TestServiceGmep.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGmep extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://gmep.org/media/14769',
            'https://gmep.org/media/14767/',
            'https://www.gmep.org/media/14763',
            'https://gmep.org/media/14740',
            'https://gmep.org/media/14725',
            'https://gmep.org/media/14714/',
        ),
        'invalid' => array(
            'https://gmep.org/media/14714/other/stuff',
            'https://gmep.org/media?query=%5Bbroad+complex+tachycardia%5D',
            'https://gmep.org/media',
            'https://gmep.org/about',
            'https://gmep.org/',
        ),
        'normalize' => array(
            'http://www.gmep.org/media/14714/' => 'https://gmep.org/media/14714',
            'http://gmep.org/media/14714' => 'https://gmep.org/media/14714',
            'http://www.gmep.org/media/14714' => 'https://gmep.org/media/14714',
            'http://gmep.org/media/14714?hi=you' => 'https://gmep.org/media/14714',
        )
    );

    public function testProvider() { $this->validateProvider('Gmep'); }
}
