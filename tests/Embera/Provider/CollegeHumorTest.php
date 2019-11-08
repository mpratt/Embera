<?php
/**
 * CollegeHumorTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the collegehumor.com Provider
 */
final class CollegeHumorTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://www.collegehumor.com/video/6830834/mitt-romney-style-gangnam-style-parody',
            'http://collegehumor.com/video/6643191/batman-chooses-his-voice',
            'http://collegehumor.com/video/6621074',
            'http://www.collegehumor.com/video/6817857/the-dark-knight-meets-the-avengers',
        ),
        'invalid_urls' => array(
            'http://www.collegehumor.com/embedVideo/6897394',
            'http://www.collegehumor.com/6897394'
        ),
        'normalize_urls' => array(
            'http://collegehumor.com/video/6621074/?string=query' => 'https://www.collegehumor.com/video/6621074'
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('CollegeHumor', [ 'width' => 480, 'height' => 270]);
    }
}
