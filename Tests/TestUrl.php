<?php
/**
 * TestUrl.php
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestUrl extends PHPUnit_Framework_TestCase
{
    public function testUrlConstruction()
    {
        $url = new \Embera\Url('http://localhost.com');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('localhost.com', $url->host);

        $url = new \Embera\Url('http://loCalHoSt.com');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('localhost.com', $url->host);

        $url = new \Embera\Url('http://www.youtube.com/watch?id=3453453');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('youtube.com', $url->host);
        $this->assertEquals('/watch', $url->path);
        $this->assertEquals('id=3453453', $url->query);

        $url = new \Embera\Url('http://localhost.com/path/to.stuff');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('localhost.com', $url->host);
        $this->assertEquals('/path/to.stuff', $url->path);

        $url = new \Embera\Url('http://www.www.stuff.com/other/stuff/');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('www.stuff.com', $url->host);
        $this->assertEquals('/other/stuff/', $url->path);

        $url = new \Embera\Url('https://localhost.com');
        $this->assertTrue(isset($url->host));
        $this->assertTrue(isset($url->scheme));
        $this->assertTrue(isset($url->query));
        $this->assertTrue(isset($url->fragment));
        $this->assertTrue(isset($url->path));
        $this->assertEquals('localhost.com', $url->host);
        $this->assertEquals('https', $url->scheme);
    }

    public function testOriginalUrl()
    {
        $url = new \Embera\Url('http://localhost.com/path/to.stuff');
        $this->assertEquals('http://localhost.com/path/to.stuff', $url->original);

        $url = new \Embera\Url('http://www.www.stuff.com/other/stuff/');
        $this->assertEquals('http://www.www.stuff.com/other/stuff/', $url->original);
    }

    public function testUrlSetter()
    {
        $url = new \Embera\Url('http://localhost.com/path/');
        $this->assertEquals('http://localhost.com/path/', $url->original);

        $url->path = '/no-path/';
        $this->assertEquals('http://localhost.com/path/', $url->original);
        $this->assertEquals('http://localhost.com/no-path/', (string) $url);
    }

    public function testUrlReconstruction()
    {
        $url = new \Embera\Url('http://localhost.com/path/to.stuff');
        $this->assertEquals('http://localhost.com/path/to.stuff', (string) $url);

        $url = new \Embera\Url('http://www.hello.com/other/stuff/?id=no&list=yes');
        $this->assertEquals('http://hello.com/other/stuff/?id=no&list=yes', (string) $url);

        $url = new \Embera\Url('https://www.url.com/the/walking/dead/');
        $this->assertEquals('https://url.com/the/walking/dead/', (string) $url);

        $url = new \Embera\Url('http://www.www.stuff.com/other/stuff/');
        $this->assertEquals('http://www.stuff.com/other/stuff/', (string) $url);
    }

    public function testUrlExceptions1()
    {
        $this->setExpectedException('InvalidArgumentException');
        $url = new \Embera\Url('localhost.com');
    }

    public function testUrlExceptions2()
    {
        $this->setExpectedException('InvalidArgumentException');
        $url = new \Embera\Url('http://ww');
    }

    public function testUrlExceptions3()
    {
        $this->setExpectedException('InvalidArgumentException');
        $url = new \Embera\Url('192.168.0.1');
    }

    public function testUrlExceptions4()
    {
        $this->setExpectedException('InvalidArgumentException');
        $url = new \Embera\Url('234bksbkjdsfu23b4i23bebriwe');
    }

    public function testUrlExceptions5()
    {
        $this->setExpectedException('InvalidArgumentException');
        $url = new \Embera\Url('url');
    }
}
?>
