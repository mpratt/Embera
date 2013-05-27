<?php
/**
 * TestQikProvider.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestQikProvider extends PHPUnit_Framework_TestCase
{
    protected $validUrls = array(
        'http://www.qik.com/video/26383698',
        'http://qik.com/video/4226370',
        'http://qik.com/video/3698881',
        'http://qik.com/video/2130131'
    );

    protected $invalidUrls = array(
        'http://qik.com/stuff/26383698',
        'http://qik.com/video/a452342b',
        'http://qik.com/video/3698881/other-stuff-here/',
        'http://qik.com/noidea/video/2130131'
    );

    public function testInvalidUrl()
    {
        $this->setExpectedException('InvalidArgumentException');

        $oembed = new MockOembed(new MockHttpRequest());
        $yt = new \Embera\Providers\Qik($this->invalidUrls[mt_rand(0, (count($this->invalidUrls) - 1))], array(), $oembed);
    }

    public function testRealResponse()
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Qik($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Qik($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);

        $url = $this->validUrls[mt_rand(0, (count($this->validUrls) - 1))];
        $yt = new \Embera\Providers\Qik($url, array('oembed' => true), $oembed);
        $result = $yt->getInfo();
        $this->assertTrue($result['embera_using_fake'] == 0);
    }
}

?>
