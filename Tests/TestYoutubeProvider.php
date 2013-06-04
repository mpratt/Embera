<?php
/**
 * TestYoutubeProvider.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestYoutubeProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Youtube');
        $this->invalidUrls = UrlList::get('Youtube', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $yt = new \Embera\Providers\Youtube('http://youtu.be/9bZkp7q19f0/werwer', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=9bZkp7q19f0');

        $yt = new \Embera\Providers\Youtube('http://www.youtube.com/watch?v=9bZkp7q19f0', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=9bZkp7q19f0');

        $yt = new \Embera\Providers\Youtube('http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=xVrJ8DxECbg');

        $yt = new \Embera\Providers\Youtube('http://youtu.be/8aGEb_yUpMs', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=8aGEb_yUpMs');

        $yt = new \Embera\Providers\Youtube('http://youtube.com/watch?v=J---aiyznGQ&index=1', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=J---aiyznGQ');

        $yt = new \Embera\Providers\Youtube('http://youtube.com/watch?v=mghhLqu31cQ', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.youtube.com/watch?v=mghhLqu31cQ');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Youtube($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $yt = new \Embera\Providers\Youtube($url, array(), $oembed);
            $response = $yt->fakeResponse();

            $this->assertTrue((count($response) > 5));
            $this->assertContains('<iframe', $response['html']);
            $this->assertEquals('video', $response['type']);
        }
    }

    public function testFakeAndRealResponse()
    {
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

        $yt = new \Embera\Providers\Youtube($url, array('oembed' => true), $oembed);
        $result1 = $yt->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0);
        $this->assertTrue(!empty($result1['html']));

        $yt = new \Embera\Providers\Youtube($url, array('oembed' => false), $oembed);
        $result2 = $yt->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1);
        $this->assertTrue(!empty($result2['html']));

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 50);
    }
}

?>
