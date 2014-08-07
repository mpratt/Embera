<?php
/**
 * TestUrl.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestUrl extends PHPUnit_Framework_TestCase
{
    public function testInvalidPattern()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/stuff/');
        $url->invalidPattern('\.net/path/(?:[^/]+)/');
        $this->assertEmpty((string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net');
        $url->invalidPattern('\.net/hi/');
        $this->assertEquals('http://www.hablarmierda.net', (string) $url);
    }

    public function testStripQueryString()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/?hi=why&id=8');
        $url->stripQueryString();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path?hi=why&id=8');
        $url->stripQueryString();
        $this->assertEquals('http://www.hablarmierda.net/path', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path/#hi');
        $url->stripQueryString();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path/#hi&ho=80');
        $url->stripQueryString();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->stripQueryString();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);
    }

    public function testDiscardChanges()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/?hi=why&id=8');
        $url->stripQueryString();
        $url->stripLastSlash();
        $this->assertEquals('http://www.hablarmierda.net/path', (string) $url);

        $url->discardChanges();
        $this->assertEquals('http://www.hablarmierda.net/path/?hi=why&id=8', (string) $url);
    }

    public function testStripLastSlash()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->stripLastSlash();
        $this->assertEquals('http://www.hablarmierda.net/path', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path////');
        $url->stripLastSlash();
        $this->assertEquals('http://www.hablarmierda.net/path', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path');
        $url->stripLastSlash();
        $this->assertEquals('http://www.hablarmierda.net/path', (string) $url);
    }

    public function testStripWWW()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->stripWWW();
        $this->assertEquals('http://hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('https://www.hablarmierda.net/path/');
        $url->stripWWW();
        $this->assertEquals('https://hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://hablarmierda.www.net/path/');
        $url->stripWWW();
        $this->assertEquals('http://hablarmierda.www.net/path/', (string) $url);

        $url = new \Embera\Url('http://hablarmierda.net/path/');
        $url->stripWWW();
        $this->assertEquals('http://hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://hablarmierda.net/path/www.');
        $url->stripWWW();
        $this->assertEquals('http://hablarmierda.net/path/www.', (string) $url);
    }

    public function testAddWWW()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->addWWW();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://hablarmierda.net/path/');
        $url->addWWW();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('https://hablarmierda.net/path/');
        $url->addWWW();
        $this->assertEquals('https://www.hablarmierda.net/path/', (string) $url);
    }

    public function testConvertToHttp()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->convertToHttp();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('https://hablarmierda.net/path/');
        $url->convertToHttp();
        $this->assertEquals('http://hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('https://www.hablarmierda.net/path/');
        $url->convertToHttp();
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);
    }

    public function testConvertToHttps()
    {
        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->convertToHttps();
        $this->assertEquals('https://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('https://hablarmierda.net/path/');
        $url->convertToHttps();
        $this->assertEquals('https://hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('http://www.hablarmierda.net/path/');
        $url->convertToHttps();
        $this->assertEquals('https://www.hablarmierda.net/path/', (string) $url);
    }

    public function testEmbed()
    {
        $url = new \Embera\Url('embed://www.hablarmierda.net/path/');
        $this->assertEquals('http://www.hablarmierda.net/path/', (string) $url);

        $url = new \Embera\Url('embed://www.hablarmierda.net/path/');
        $url->convertToHttps();
        $this->assertEquals('https://www.hablarmierda.net/path/', (string) $url);
    }
}

?>
