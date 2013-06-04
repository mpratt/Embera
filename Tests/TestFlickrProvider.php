<?php
/**
 * TestFlickrProvider.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestFlickrProvider extends PHPUnit_Framework_TestCase
{

    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Flickr');
        $this->invalidUrls = UrlList::get('Flickr', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $yt = new \Embera\Providers\Flickr('http://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.flickr.com/photos/22134962@N03/8738306577/');

        $yt = new \Embera\Providers\Flickr('http://flic.kr/p/9gAMbM', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://flic.kr/p/9gAMbM');

        $yt = new \Embera\Providers\Flickr('http://www.flickr.com/photos/reddragonflydmc/5427387397/?noise=noise', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.flickr.com/photos/reddragonflydmc/5427387397/');

        $yt = new \Embera\Providers\Flickr('http://www.flickr.com/photos/bees/8597283706/in/photostream', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.flickr.com/photos/bees/8597283706/');

        $yt = new \Embera\Providers\Flickr('http://flic.kr/p/9gAMbM/', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://flic.kr/p/9gAMbM/');

        $yt = new \Embera\Providers\Flickr('http://www.flickr.com/photos/bees/8429256478', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.flickr.com/photos/bees/8429256478/');

        $yt = new \Embera\Providers\Flickr('http://www.flickr.com/photos/bees/8429256478/', array(), $oembed);
        $this->assertEquals($yt->getUrl(), 'http://www.flickr.com/photos/bees/8429256478/');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Flickr($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testRealResponse()
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Flickr($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Flickr($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Flickr($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);
    }
}

?>
