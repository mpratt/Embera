<?php
/**
 * TestProviderClass.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestProviderClass extends PHPUnit_Framework_TestCase
{
    public function testInvalidProviders()
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers(array(), array(), $oembed);
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers(null, array(), $oembed);
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers('http://www.unknown.com', array(), $oembed);
        $this->assertEmpty($p->getAll());

        $urls = array('http://www.unknown.com/path/stuf/?hi=1', 'http://www.thewalkingdead.com/stuff/');
        $p = new \Embera\Providers($urls, array(), $oembed);
        $this->assertEmpty($p->getAll());
    }

    // Dont repeat yourself
    protected function validateDetection(array $validUrls, array $invalidUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $p = new \Embera\Providers($validUrls, array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), 'The valid Urls dont seem to be detected correctly');

        $p = new \Embera\Providers(array_merge($validUrls, $invalidUrls), array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), 'There is one invalid url recognized as valid');

        $p = new \Embera\Providers($validUrls[mt_rand(0, (count($validUrls) - 1))], array(), $oembed);
        $this->assertCount(1, $p->getAll());
    }

    public function testYoutubeDetection()
    {
        $validUrls   = UrlList::get('Youtube');
        $invalidUrls = UrlList::get('Youtube', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testFlickrDetection()
    {
        $validUrls   = UrlList::get('Flickr');
        $invalidUrls = UrlList::get('Flickr', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testVimeoDetection()
    {
        $validUrls   = UrlList::get('Vimeo');
        $invalidUrls = UrlList::get('Vimeo', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testDailyMotionDetection()
    {
        $validUrls   = UrlList::get('DailyMotion');
        $invalidUrls = UrlList::get('DailyMotion', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testViddlerDetection()
    {
        $validUrls   = UrlList::get('Viddler');
        $invalidUrls = UrlList::get('Viddler', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testQikDetection()
    {
        $validUrls   = UrlList::get('Qik');
        $invalidUrls = UrlList::get('Qik', true);

        $this->validateDetection($validUrls, $invalidUrls);
    }
}
?>
