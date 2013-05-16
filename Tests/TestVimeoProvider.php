<?php
/**
 * TestVimeoProvider.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestVimeoProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls = array('http://vimeo.com/channels/staffpicks/66252440',
                                 'http://vimeo.com/channels/staffpicks/65535198/',
                                 'http://vimeo.com/groups/shortfilms/videos/66185763',
                                 'http://vimeo.com/groups/shortfilms/videos/63313811/',
                                 'http://vimeo.com/47360546',
                                 'http://vimeo.com/39892335/',
                                 'https://player.vimeo.com/video/65297606',
                                 'https://player.vimeo.com/video/25818086/');

    protected $invalidUrls = array('http://vimeo.com/groups/shortfilms/videos/66185763/stuff/here',
                                   'http://vimeo.com/47360546/other/stuff/',
                                   'http://vimeo.com/groups/shortfilms/123',
                                   'http://vimeo.com/groups/shortfilms',
                                   'http://vimeo.com/groups/stuff/?autoplay=1');

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $vm = new \Embera\Providers\Vimeo('http://vimeo.com/channels/staffpicks/66252440', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/66252440');

        $vm = new \Embera\Providers\Vimeo('http://vimeo.com/channels/staffpicks/65535198/', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/65535198');

        $vm = new \Embera\Providers\Vimeo('https://player.vimeo.com/video/65297606', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/65297606');

        $vm = new \Embera\Providers\Vimeo('http://vimeo.com/groups/shortfilms/videos/63313811/', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/63313811');

        $vm = new \Embera\Providers\Vimeo('http://vimeo.com/47360546', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/47360546');

        $vm = new \Embera\Providers\Vimeo('http://vimeo.com/39892335/', array(), $oembed);
        $this->assertEquals($vm->getUrl(), 'http://vimeo.com/39892335');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        $vm = new \Embera\Providers\Vimeo($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testFakeResponse()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        foreach ($this->validUrls as $url)
        {
            $vm = new \Embera\Providers\Vimeo($url, array(), $oembed);
            $response = $vm->fakeResponse();

            $this->assertTrue((count($response) > 5));
            $this->assertContains('<iframe', $response['html']);
            $this->assertEquals('video', $response['type']);
        }
    }

    public function testFakeAndRealResponse()
    {
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

        $vm = new \Embera\Providers\Vimeo($url, array('oembed' => true), $oembed);
        $result1 = $vm->getInfo();

        $this->assertTrue($result1['embera_using_fake'] == 0);
        $this->assertTrue(!empty($result1['html']));

        $vm = new \Embera\Providers\Vimeo($url, array('oembed' => false), $oembed);
        $result2 = $vm->getInfo();

        $this->assertTrue($result2['embera_using_fake'] == 1);
        $this->assertTrue(!empty($result2['html']));

        similar_text($result1['html'], $result2['html'], $percent);
        $this->assertTrue($percent >= 50);
    }
}

?>
