<?php
/**
 * TestHuluProvider.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestHuluProvider extends PHPUnit_Framework_TestCase
{

    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Hulu');
        $this->invalidUrls = UrlList::get('Hulu', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $test = new \Embera\Providers\Hulu('http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.hulu.com/watch/20807');

        $test = new \Embera\Providers\Hulu('http://www.hulu.com/watch/440265/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.hulu.com/watch/440265');

        $test = new \Embera\Providers\Hulu('http://www.hulu.com/watch/416223?playlist_id=1787&asset_scope=movies', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.hulu.com/watch/416223');

        $test = new \Embera\Providers\Hulu('http://hulu.com/watch/331822/stuff/here', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.hulu.com/watch/331822');

        $test = new \Embera\Providers\Hulu('http://hulu.com/watch/501126', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.hulu.com/watch/501126');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Hulu($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testRealResponse()
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Hulu($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using Fake on ' . $url);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Hulu($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using Fake on ' . $url);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Hulu($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using Fake on ' . $url);
    }
}

?>
