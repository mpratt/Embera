<?php
/**
 * TestServiceLearningApps.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceLearningApps extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://learningapps.org/1453543',
            'http://learningapps.org/58598/',
            'http://learningapps.org/1156943?query=string',
        ),
        'invalid' => array(
            'http://learningapps.org/index.php?overview&s=&category=0&tool=',
            'http://learningapps.org/index.php',
            'http://learningapps.org/',
            'http://learningapps.org/58598/other-stuff',
            'http://learningapps.org/index.php?category=14&s=',
        ),
    );

    public function testProvider() { $this->validateProvider('LearningApps'); }
}
