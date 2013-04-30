<?php
/**
 * TestEmbera.php
 *
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
        $this->setExpectedException('InvalidArgumentException');

        $embera = new \Embera\Embera();
        $embera->autoEmbed(array('http://www.youtube.com/watch?v=GP18O6gSWSw&feature=share&list=PL4EF7BAD98F9812B6'));
    }

    public function testYoutubeAutoEmbed()
    {
        $embera = new \Embera\Embera();
        $result = $embera->autoEmbed(' http://www.youtube.com/watch?v=GP18O6gSWSw&feature=share&list=PL4EF7BAD98F9812B6 ');
        $this->assertContains('<iframe ', $result);

        $embera = new \Embera\Embera();
        $result = $embera->autoEmbed('Hi I would like for you to check this link
            http://www.youtube.com/watch?v=pgTuarwFm6s
            Its simply a great video.');
        $this->assertContains('<iframe ', $result);

        $text = 'This is a text without a link!';
        $result = $embera->autoEmbed($text);
        $this->assertEquals($text, $result);
    }

    public function testYoutubeUrlInspection()
    {
        $embera = new \Embera\Embera();
        $result = $embera->getUrlInfo('Hi I would like for you to check this link http://www.youtube.com/watch?v=pgTuarwFm6s.');
        $this->assertCount(1, $result);

        $result = $embera->getUrlInfo('http://www.youtube.com/watch?v=pgTuarwFm6s http://www.youtube.com/watch?v=pgTuarwFm6s.');
        $this->assertCount(1, $result);

        $result = $embera->getUrlInfo('http://www.youtube.com/watch?v=pgTuarwFm6s http://www.youtube.com/watch?v=p4sd4sfGG8 ');
        $this->assertCount(2, $result);

        $result = $embera->getUrlInfo('There are no links here');
        $this->assertCount(0, $result);
    }

    public function testYoutubeArrayInput()
    {
        $urls = array('www.youtube.com/watch?v=J---aiyznGQ',
                      'http://stuff.video.com /watch?video=J---aiyznGQ',
                      'http://www.youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
                      'http://www.video.com/hi#ho',
                      'http://youtu.be/8aGEb_yUpMs');

        $embera = new \Embera\Embera();
        $result = $embera->getUrlInfo($urls);
        $this->assertCount(2, $result);
    }
}

?>
