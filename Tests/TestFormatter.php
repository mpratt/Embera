<?php
/**
 * TestFormatter.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestFormatter extends PHPUnit_Framework_TestCase
{
    public function testTemplateArray()
    {
        $urls = array(
            'http://youtu.be/fSUK4WgQ3vk',
            'http://www.youtube.com/watch?v=T3O1nffTG-k'
        );

        $embera = new \Embera\Embera();
        $embera = new \Embera\Formatter($embera);
        $embera->setTemplate('{html}|');

        $result = $embera->transform($urls);
        $this->assertCount(count($urls), explode('|', trim($result, '|')));
    }

    public function testTemplateString()
    {
        $embera = new \Embera\Embera();
        $embera = new \Embera\Formatter($embera);
        $embera->setTemplate('<div class="hey">{html}</div>');
        $result = $embera->transform('Hey did you see http://www.youtube.com/watch?v=MpVHQnIvTXo');

        $this->assertContains('<div class="hey"><iframe', $result);
    }

    public function testTemplateRecursionKeys()
    {
        $embera = new \Embera\Embera();
        $embera = new \Embera\Formatter($embera);
        $embera->setTemplate('{raw.html}');
        $result = $embera->transform('https://www.facebook.com/adam.j.mccann/posts/10156943904420037?pnref=story');

        $this->assertContains('fb-root', $result);
    }

    public function testOfflineSupport()
    {
        $urls = array(
            'http://www.youtube.com/watch?v=MpVHQnIvTXo',
            'http://youtu.be/fSUK4WgQ3vk',
        );

        $embera = new \Embera\Embera(array('oembed' => false));
        $embera = new \Embera\Formatter($embera);
        $embera->setTemplate('<div class="hi">{html}</div>');

        $result = $embera->transform($urls);
        $this->assertEmpty($result);
        $this->assertTrue($embera->hasErrors());
        $this->assertCount(count($urls), $embera->getErrors());

        $last = $embera->getLastError();
        $this->assertTrue(!empty($last));
    }

    public function testOfflineSupport2()
    {
        $urls = array('http://youtu.be/fSUK4WgQ3vk');

        $embera = new \Embera\Embera(array('oembed' => false));
        $embera = new \Embera\Formatter($embera, true);
        $embera->setTemplate('<div class="hi">{html}</div>');

        $result = $embera->transform($urls);
        $this->assertContains('<iframe', $result);
    }

    public function testSupportForDecoratedObjectAPI()
    {
        $urls = array(
            'http://www.youtube.com/watch?v=MpVHQnIvTXo',
            'http://youtu.be/fSUK4WgQ3vk',
        );

        $embera = new \Embera\Embera(array('oembed' => false));
        $embera = new \Embera\Formatter($embera);

        $result = $embera->autoEmbed(implode(' ', $urls));
        $this->assertTrue(!empty($result));
        $this->assertContains('<iframe', $result);
    }

    public function testSupportForDecoratedObjectAPI2()
    {
        $this->setExpectedException('InvalidArgumentException');

        $embera = new \Embera\Embera(array('oembed' => false));
        $embera = new \Embera\Formatter($embera);

        $last = $embera->getLastError();
        $this->assertTrue(empty($last));

        $embera->unknownMethodName();
    }

    public function testUnknownWebsites()
    {
        $embera = new \Embera\Embera();
        $embera = new \Embera\Formatter($embera);

        $this->assertEmpty($embera->setTemplate('{html}', array('url1.com', 'url2.com', 'url3.com')));
        $this->assertEquals($embera->setTemplate('{html}', 'unknown url http://hey.com'), 'unknown url http://hey.com');
    }

    public function testRemoveEmptyPlaceholders()
    {
        $urls = array('http://youtu.be/fSUK4WgQ3vk');

        $embera = new \Embera\Embera();
        $embera = new \Embera\Formatter($embera);
        $embera->setTemplate('{unknown_key}');

        $result = $embera->transform($urls);
        $this->assertEquals($result, '');
    }
}

?>
