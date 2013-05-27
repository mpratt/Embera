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
        $validUrls = array(
            'http://www.youtube.com/watch?v=9bZkp7q19f0',
            'http://youtube.com/watch?v=J---aiyznGQ',
            'http://www.youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
            'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW',
            'http://www.youtube.com/watch?v=9VrJ8D6ECbg&index=1',
            'http://youtube.com/watch?v=mghhLqu31cQ',
            'http://youtu.be/8aGEb_yUpMs'
        );

        $invalidUrls = array(
            'http://youtube.com/watch?list=hi',
            'www.youtube.com/watch?v=J---aiyznGQ', // No Http at the beginning of the url
            'http://youtube.com /watch?video=J---aiyznGQ',
            'http://www.youtu.be.com/watch?lol=no',
            'http://www.youtube.com/hi#ho',
            'http://youtube.com/',
            'http://www.youtube.com/?id=ho'
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testFlickrDetection()
    {
        $validUrls = array(
            'http://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14',
            'http://flic.kr/p/9gAMbM',
            'http://www.flickr.com/photos/reddragonflydmc/5427387397/',
            'http://www.flickr.com/photos/bees/8597283706/in/photostream',
            'http://www.flickr.com/photos/bees/8537962055/?noise=noise',
            'http://flic.kr/p/9gAMbM/',
            'http://www.flickr.com/photos/bees/8429256478'
        );

        $invalidUrls = array(
            'http://www.flickr.com/22134962@N03/8738306577/',
            'http://www.flickr.com',
            'http://www.flickr.com/stuff/8429256478/',
            'http://www.flickr.com/noise/8429256478/',
            'http://www.flickr.com//8429256478/'
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testVimeoDetection()
    {
        $validUrls = array(
            'http://vimeo.com/channels/staffpicks/66252440',
            'http://vimeo.com/channels/staffpicks/65535198/',
            'http://vimeo.com/groups/shortfilms/videos/66185763',
            'http://vimeo.com/groups/shortfilms/videos/63313811/',
            'http://vimeo.com/47360546',
            'http://vimeo.com/39892335/',
            'https://player.vimeo.com/video/65297606',
            'https://player.vimeo.com/video/25818086/'
        );

        $invalidUrls = array(
            'http://vimeo.com/groups/shortfilms/videos/66185763/stuff/here',
            'http://vimeo.com/47360546/other/stuff/',
            'http://vimeo.com/groups/shortfilms/123',
            'http://vimeo.com/groups/shortfilms',
            'http://vimeo.com/',
            'http://vimeo.com/groups/stuff/?autoplay=1'
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testDailyMotionDetection()
    {
        $validUrls = array(
            'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
            'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
            'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/',
            'http://www.dailymotion.com/video/xzva95_jacob-jones-and-the-bigfoot-mystery-launch-trailer_videogames',
            'http://www.dailymotion.com/video/xzx9vo_marc-gasol-lleva-a-memphis-a-su-primera-final-de-conferencia_sport',
            'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss',
            'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport/stuff/here/',
            'http://www.dailymotion.com/embed/video/xzxfpu',
            'http://www.dailymotion.com/embed/video/xzv0cd/'
        );

        $invalidUrls = array(
            'http://www.dailymotion.com',
            'http://dailymotion.com',
            'http://www.dailymotion.com/channel/stuff/',
            'http://www.dailymotion.com/stuff/',
            'http://www.dailymotion.com/video/'
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testViddlerDetection()
    {
        $validUrls = array(
            'http://www.viddler.com/v/a695c468',
            'http://www.viddler.com/v/a695c468/lightbox?autoplay=1',
            'http://www.viddler.com/v/528b194c/otherStuff/lightbox',
            'http://viddler.com/embed/4c57d97a/lightbox',
            'http://viddler.com/v/4c57d97a/lightbox',
            'http://viddler.com/v/c83cacd4'
        );

        $invalidUrls = array(
            'http://viddler.com/invalidstuff/a695c468',
            'http://www.viddler.com/v/zxsdg9',
            'http://www.viddler.com/player/528b194c/otherStuff/lightbox',
            'http://viddler.com/v/',
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }

    public function testQikDetection()
    {
        $validUrls = array(
            'http://www.qik.com/video/26383698',
            'http://qik.com/video/4226370',
            'http://qik.com/video/3698881',
            'http://qik.com/video/2130131'
        );

        $invalidUrls = array(
            'http://qik.com/stuff/26383698',
            'http://qik.com/video/a452342b', // Not numeric
            'http://qik.com/video/3698881/other-stuff-here/',
            'http://qik.com/noidea/video/2130131'
        );

        $this->validateDetection($validUrls, $invalidUrls);
    }
}
?>
