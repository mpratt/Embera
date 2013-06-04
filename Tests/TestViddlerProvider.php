<?php
/**
 * TestViddlerProvider.php
 *
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
        $vdd = new \Embera\Providers\Viddler('http://www.viddler.com/v/a695c468', array(), $oembed);
        $this->assertEquals($vdd->getUrl(), 'http://www.viddler.com/v/a695c468');

        $vdd = new \Embera\Providers\Viddler('http://www.viddler.com/v/a695c468/', array(), $oembed);
        $this->assertEquals($vdd->getUrl(), 'http://www.viddler.com/v/a695c468');

        $vdd = new \Embera\Providers\Viddler('http://www.viddler.com/v/528b194c/otherStuff/lightbox', array(), $oembed);
        $this->assertEquals($vdd->getUrl(), 'http://www.viddler.com/v/528b194c');

        $vdd = new \Embera\Providers\Viddler('http://viddler.com/embed/4c57d97a/lightbox', array(), $oembed);
        $this->assertEquals($vdd->getUrl(), 'http://www.viddler.com/v/4c57d97a');

        $vdd = new \Embera\Providers\Viddler('http://viddler.com/embed/4c57d97a/', array(), $oembed);
        $this->assertEquals($vdd->getUrl(), 'http://www.viddler.com/v/4c57d97a');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Viddler($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $vdd = new \Embera\Providers\Viddler($url, array(), $oembed);
            $response = $vdd->fakeResponse();

            $this->assertTrue((count($response) > 5));
            $this->assertContains('<iframe', $response['html']);
            $this->assertEquals('video', $response['type']);
        }
    }

    public function testFakeAndRealResponse()
    {
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

        $vdd = new \Embera\Providers\Viddler($url, array('oembed' => true), $oembed);
        $result1 = $vdd->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0);
        $this->assertTrue(!empty($result1['html']));

        $vdd = new \Embera\Providers\Viddler($url, array('oembed' => false), $oembed);
        $result2 = $vdd->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1);
        $this->assertTrue(!empty($result2['html']));

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 50);
    }
}

?>
