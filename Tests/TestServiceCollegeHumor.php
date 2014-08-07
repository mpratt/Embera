<?php
/**
 * TestServiceCollegeHumor.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCollegeHumor extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.collegehumor.com/video/6830834/mitt-romney-style-gangnam-style-parody',
            'http://www.collegehumor.com/embed/6897735/dogs-come-1-by-1-for-treats-theres-a-cat-and-oh-also-a-duck/',
            'http://www.collegehumor.com/video/6897575/',
            'http://www.collegehumor.com/embed/6897394',
            'http://www.collegehumor.com/video/6182447/kid-farm',
            'http://collegehumor.com/video/6643191/batman-chooses-his-voice',
            'http://collegehumor.com/video/6621074',
            'http://www.collegehumor.com/video/6817857/the-dark-knight-meets-the-avengers',
        ),
        'invalid' => array(
            'http://www.collegehumor.com/embedVideo/6897394', // wrong path
            'http://www.collegehumor.com/embed/6buaksui4', // Not numeric
            'http://www.collegehumor.com/videos/6897394',
            'http://www.collegehumor.com/6897394'
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('CollegeHumor'); }
}
?>
