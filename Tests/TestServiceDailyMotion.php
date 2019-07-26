<?php
/**
 * TestServiceDailyMotion.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDailyMotion extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
            'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
            'http://www.dailymotion.com/video/xzva95_jacob-jones-and-the-bigfoot-mystery-launch-trailer_videogames',
            'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss',
            'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport/stuff/here/',
            'http://www.dailymotion.com/embed/video/xzv0cd/',
            'http://dai.ly/xzse1m',
            'http://games.dailymotion.com/video/xq3p3u',
            'http://games.dailymotion.com/video/x2gfjhs',
            'http://games.dailymotion.com/live/x15gjhi',
        ),
        'invalid' => array(
            'http://www.dailymotion.com',
            'http://dailymotion.com',
            'http://www.dailymotion.com/channel/stuff/',
            'http://www.dailymotion.com/stuff/',
            'http://www.dailymotion.com/video/'
        ),
        'normalize' =>  array(
            'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun' => 'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
            'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto' => 'http://www.dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
            'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/' => 'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport',
            'http://www.dailymotion.com/embed/video/xzxfpu' => 'http://www.dailymotion.com/video/xzxfpu',
            'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss' => 'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport',
            'http://www.dailymotion.com/embed/video/xzv0cd/' => 'http://www.dailymotion.com/video/xzv0cd',
            'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport/stuff/here/' => 'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport',
            'http://dai.ly/xzv0cd/' => 'http://www.dailymotion.com/video/xzv0cd',
            'http://dai.ly/xzv0cd' => 'http://www.dailymotion.com/video/xzv0cd',
            'http://games.dailymotion.com/live/xq3p3u' => 'http://www.dailymotion.com/video/xq3p3u',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('DailyMotion'); }
}
