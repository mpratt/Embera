<?php
/**
 * DailyMotionTest.php
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
 * Test the dailymotion.com Provider
 */
final class DailyMotionTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
            'https://www.dailymotion.com/video/x7nq9ov?playlist=x5v2j4',
            'https://dai.ly/x6g6ed2',
            'http://games.dailymotion.com/live/x15gjhi',
        ),
        'invalid_urls' => array(
            'http://www.dailymotion.com',
            'http://dailymotion.com',
            'http://www.dailymotion.com/channel/stuff/',
            'http://www.dailymotion.com/stuff/',
            'http://www.dailymotion.com/video/'
        ),
        'normalize_urls' => array(
            'http://dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun' => 'https://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
            'http://www.dailymotion.com/video/xzx4m4?from=rss' => 'https://www.dailymotion.com/video/xzx4m4',
            'http://www.dailymotion.com/embed/video/xzv0cd/' => 'https://www.dailymotion.com/video/xzv0cd',
            'http://www.dailymotion.com/video/xzse1m/stuff/here/' => 'https://www.dailymotion.com/video/xzse1m',
            'http://dai.ly/xzv0cd/' => 'https://www.dailymotion.com/video/xzv0cd',
            'http://games.dailymotion.com/live/xq3p3u' => 'https://www.dailymotion.com/video/xq3p3u',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (DailyMotion).');
        }

        $this->validateProvider('DailyMotion', [ 'width' => 480, 'height' => 270]);
    }
}
