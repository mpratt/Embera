<?php
/**
 * TestServiceOumy.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceOumy extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.oumy.com/v/0rdiVajPP9b7pQjs18Lv7H7',
            'https://oumy.com/v/01BgyjAsCtC80d1vGDw4uOr1',
            'https://www.oumy.com/v/0UG9iWZqccZ88VXqIaNHIe5?query=string',
            'http://www.oumy.com/v/016SQZ9MrzE6nL6s5a32pz5',
            'http://oumy.com/v/0w7TvZ9e9Vs9gs4MznydO71',
        ),
        'invalid' => array(
            'https://www.oumy.com',
            'https://oumy.com/features',
            'http://www.oumy.com/v/other/016SQZ9MrzE6nL6s5a32pz5',
            'http://www.oumy.com/r/016SQZ9MrzE6nL6s5a32pz5',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Oumy'); }
}
