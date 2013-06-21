<?php
/**
 * TestDailyMotionProvider.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestDailyMotionProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('DailyMotion');
        $this->invalidUrls = UrlList::get('DailyMotion', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $test = new \Embera\Providers\DailyMotion('http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun');

        $test = new \Embera\Providers\DailyMotion('http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto');

        $test = new \Embera\Providers\DailyMotion('http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport');

        $test = new \Embera\Providers\DailyMotion('http://www.dailymotion.com/embed/video/xzxfpu', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xzxfpu');

        $test = new \Embera\Providers\DailyMotion('http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport');

        $test = new \Embera\Providers\DailyMotion('http://www.dailymotion.com/embed/video/xzv0cd/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.dailymotion.com/video/xzv0cd');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        $url = $this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))];

        new \Embera\Providers\DailyMotion($url, array(), $oembed);

        echo 'This url seems to be valid ' . $url;
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $test = new \Embera\Providers\DailyMotion($url, array(), $oembed);
            $response = $test->fakeResponse();

            $this->assertTrue((count($response) > 5), 'Invalid Response count on ' . $url);
            $this->assertContains('<iframe', $response['html'], 'Response Doesnt contain iframe in ' . $url);
            $this->assertEquals('video', $response['type'], 'Response type for ' . $url . ' is not video');
        }
    }

    public function testFakeAndRealResponse()
    {
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

        $test = new \Embera\Providers\DailyMotion($url, array('oembed' => true), $oembed);
        $result1 = $test->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
        $this->assertTrue(!empty($result1['html']), 'Empty Html on ' . $url);

        $test = new \Embera\Providers\DailyMotion($url, array('oembed' => false), $oembed);
        $result2 = $test->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
        $this->assertTrue(!empty($result2['html']), 'Empty Html on ' . $url);

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off');
    }
}

?>
