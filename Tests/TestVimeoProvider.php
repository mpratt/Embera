<?php
/**
 * TestVimeoProvider.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestVimeoProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Vimeo');
        $this->invalidUrls = UrlList::get('Vimeo', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $test = new \Embera\Providers\Vimeo('http://vimeo.com/channels/staffpicks/66252440', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/66252440');

        $test = new \Embera\Providers\Vimeo('http://vimeo.com/channels/staffpicks/65535198/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/65535198');

        $test = new \Embera\Providers\Vimeo('https://player.vimeo.com/video/65297606', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/65297606');

        $test = new \Embera\Providers\Vimeo('http://vimeo.com/groups/shortfilms/videos/63313811/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/63313811');

        $test = new \Embera\Providers\Vimeo('http://vimeo.com/47360546', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/47360546');

        $test = new \Embera\Providers\Vimeo('http://vimeo.com/39892335/', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://vimeo.com/39892335');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Vimeo($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $test = new \Embera\Providers\Vimeo($url, array(), $oembed);
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

        $test = new \Embera\Providers\Vimeo($url, array('oembed' => true), $oembed);
        $result1 = $test->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
        $this->assertTrue(!empty($result1['html']), 'Empty Html Response on ' . $url);

        $test = new \Embera\Providers\Vimeo($url, array('oembed' => false), $oembed);
        $result2 = $test->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
        $this->assertTrue(!empty($result2['html']), 'Empty Html Response on ' . $url);

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off');
    }
}

?>
