<?php
/**
 * TestViddlerProvider.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestViddlerProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Viddler');
        $this->invalidUrls = UrlList::get('Viddler', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $test = new \Embera\Providers\Viddler('http://www.viddler.com/v/a695c468', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.viddler.com/v/a695c468');

        $test = new \Embera\Providers\Viddler('http://www.viddler.com/v/a695c468/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.viddler.com/v/a695c468');

        $test = new \Embera\Providers\Viddler('http://www.viddler.com/v/528b194c/otherStuff/lightbox', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.viddler.com/v/528b194c');

        $test = new \Embera\Providers\Viddler('http://viddler.com/embed/4c57d97a/lightbox', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.viddler.com/v/4c57d97a');

        $test = new \Embera\Providers\Viddler('http://viddler.com/embed/4c57d97a/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.viddler.com/v/4c57d97a');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        $url = $this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))];

        new \Embera\Providers\Viddler($url, array(), $oembed);

        echo 'This url seems to be valid ' . $url;
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $test = new \Embera\Providers\Viddler($url, array(), $oembed);
            $response = $test->fakeResponse();

            $this->assertTrue((count($response) > 5), 'Invalid Response for ' . $url);
            $this->assertContains('<iframe', $response['html'], 'Response is not an iframe in ' . $url);
            $this->assertEquals('video', $response['type'], 'Response type is not video on ' . $url);
        }
    }

    public function testFakeAndRealResponse()
    {
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

        $test = new \Embera\Providers\Viddler($url, array('oembed' => true), $oembed);
        $result1 = $test->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
        $this->assertTrue(!empty($result1['html']), 'Empty html response on ' . $url);

        $test = new \Embera\Providers\Viddler($url, array('oembed' => false), $oembed);
        $result2 = $test->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
        $this->assertTrue(!empty($result2['html']), 'Empty Fake Html response on ' . $url);

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off');
    }
}

?>
