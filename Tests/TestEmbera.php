<?php
/**
 * TestEmbera.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestEmbera extends PHPUnit_Framework_TestCase
{
    public function testInvalidAutoEmbedInput()
    {
        $input = array('http://www.youtube.com/watch?v=GP18O6gSWSw&feature=share&list=PL4EF7BAD98F9812B6');
        $embera = new \Embera\Embera();

        $this->assertEquals($input, $embera->autoEmbed($input));
        $this->assertTrue($embera->hasErrors());
        $this->assertTrue(is_string($embera->getLastError()));
        $this->assertCount(1, $embera->getErrors());
    }

    public function testInvalidAutoEmbedInput2()
    {
        $input = null;
        $embera = new \Embera\Embera();

        $this->assertEquals($input, $embera->autoEmbed($input));
        $this->assertTrue(is_string($embera->getLastError()));
        $this->assertTrue($embera->hasErrors());
        $this->assertCount(1, $embera->getErrors());
    }

    public function testAutoEmbedwithoutKnownServices()
    {
        $input = 'hola este texto debería seguir igual.';
        $embera = new \Embera\Embera();

        $this->assertEquals($input, $embera->autoEmbed($input));
    }

    public function testAutoEmbedwithoutKnownServices2()
    {
        $input = 'hola este texto debería seguir igual. http://www.google.com ';
        $embera = new \Embera\Embera();

        $this->assertEquals($input, $embera->autoEmbed($input));
    }

    public function testFakeUrlInspection()
    {
        $validUrls = array('http://www.youtube.com/watch?v=MpVHQnIvTXo',
                           'http://youtu.be/fSUK4WgQ3vk',
                           'http://www.youtube.com/watch?v=T3O1nffTG-k');

        $embera = new \Embera\Embera(array('oembed' => false));
        $result = $embera->getUrlInfo($validUrls);

        $this->assertCount(count($validUrls), $result);
    }

    public function testFakeAutoEmbed()
    {
        $text = 'Hey Checkout this url http://www.youtube.com/watch?v=MpVHQnIvTXo, Its just great';
        $embera = new \Embera\Embera(array('oembed' => false));
        $result = $embera->autoEmbed($text);

        $this->assertContains('<iframe', $result);
        $this->assertEmpty($embera->getLastError());
    }

    public function testDenyService()
    {
        $validUrls = array('http://www.youtube.com/watch?v=MpVHQnIvTXo',
                           'http://youtu.be/fSUK4WgQ3vk',
                           'http://vimeo.com/groups/shortfilms/videos/63313811/',
                           'http://www.youtube.com/watch?v=T3O1nffTG-k');

        $embera = new \Embera\Embera(array('oembed' => false, 'deny' => array('Youtube')));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount(1, $result);

        $embera = new \Embera\Embera(array('oembed' => false, 'deny' => array('youTube')));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount(1, $result);
    }

    public function testAllowService()
    {
        $validUrls = array('http://www.youtube.com/watch?v=MpVHQnIvTXo',
                           'http://youtu.be/fSUK4WgQ3vk',
                           'http://vimeo.com/groups/shortfilms/videos/63313811/',
                           'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/',
                           'http://www.youtube.com/watch?v=T3O1nffTG-k');

        $embera = new \Embera\Embera(array('oembed' => false, 'allow' => array('Vimeo', 'dailyMotion')));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount(2, $result);

        $embera = new \Embera\Embera(array('oembed' => false, 'allow' => array('Youtube', 'Dailymotion')));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount((count($validUrls) - 1), $result);
    }

    public function testEmbedPrefixService()
    {
        $validUrls = array('embed://www.youtube.com/watch?v=MpVHQnIvTXo',
                           'http://youtu.be/fSUK4WgQ3vk',
                           'http://vimeo.com/groups/shortfilms/videos/63313811/',
                           'embed://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/',
                           'embed://www.youtube.com/watch?v=T3O1nffTG-k');

        $embera = new \Embera\Embera(array('oembed' => false, 'use_embed_prefix' => false));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount(2, $result);

        $embera = new \Embera\Embera(array('oembed' => false, 'use_embed_prefix' => true));
        $result = $embera->getUrlInfo($validUrls);
        $this->assertCount(3, $result);
    }
}

?>
