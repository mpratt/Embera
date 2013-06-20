<?php
/**
 * TestRevision3Provider.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestRevision3Provider extends PHPUnit_Framework_TestCase
{
    protected $validUrls, $invalidUrls;

    public function setUp()
    {
        $this->validUrls   = UrlList::get('Revision3');
        $this->invalidUrls = UrlList::get('Revision3', true);
    }

    public function testUrlNormalize()
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $test = new \Embera\Providers\Revision3('http://revision3.com/sesslerssomething/e3-2013-preview', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://revision3.com/sesslerssomething/e3-2013-preview');

        $test = new \Embera\Providers\Revision3('http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android', array(), $oembed);
        $this->assertEquals($test->getUrl(), 'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android');
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        new \Embera\Providers\Revision3($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testRealResponse()
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Revision3($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using fake on ' . $url);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Revision3($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using fake on ' . $url);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $test = new \Embera\Providers\Revision3($url, array('oembed' => true), $oembed);
        $result = $test->getInfo();

        $this->assertTrue($result['embera_using_fake'] == 0, 'Using fake on ' . $url);
    }
}

?>
