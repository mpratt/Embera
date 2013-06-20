<?php
/**
 * TestProviderClass.php
 *
 * @package Tests
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

    public function testProviderDetection()
    {
        $services = array(
            'Youtube',
            'Flickr',
            'Vimeo',
            'DailyMotion',
            'Viddler',
            'Qik',
            'Revision3',
            'Hulu'
        );

        foreach ($services as $s)
        {
            $validUrls   = UrlList::get($s);
            $invalidUrls = UrlList::get($s, true);

            $this->validateDetection($s, $validUrls, $invalidUrls);
        }
    }

    protected function validateDetection($s, array $validUrls, array $invalidUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers($validUrls, array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), $s . ' The valid Urls dont seem to be detected correctly');

        $p = new \Embera\Providers(array_merge($validUrls, $invalidUrls), array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), $s . ' There is at least one invalid url recognized as valid');

        $p = new \Embera\Providers($validUrls[mt_rand(0, (count($validUrls) - 1))], array(), $oembed);
        $this->assertCount(1, $p->getAll(), $s . ' One Correct url seems to be invalid');
    }
}
?>
