<?php
/**
 * UrlTest.php
 *
 * @package Tests
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testCanRemoveQueryString()
    {
        $urls = [
            'http://www.host.com/path/?hi=why&id=8',
            'http://www.host.com/path/#hi&ho=80',
            'http://www.host.com/path/',
        ];

        foreach ($urls as $u) {
            $url = new Url($u);
            $url->removeQueryString();
            $this->assertEquals('http://www.host.com/path/', (string) $url);
        }
    }

    public function testCanDiscardChanges()
    {
        $originalUrl = 'http://www.host.com/path/?hi=why&id=8';

        $url = new Url($originalUrl);
        $url->removeQueryString();
        $url->removeLastSlash();

        $this->assertEquals('http://www.host.com/path', (string) $url);

        $url->discardChanges();
        $this->assertEquals($originalUrl, (string) $url);
    }

    public function testCanSetHost()
    {
        $originalUrl = 'http://www.host.com/path/';

        $url = new Url($originalUrl);
        $url->setHost('example.com');

        $this->assertEquals('http://example.com/path/', (string) $url);

        $url->discardChanges();
        $this->assertEquals($originalUrl, (string) $url);
    }

    public function testCanRemoveLastSlash()
    {
        $url = new Url('http://www.host.com/path////');
        $url->removeLastSlash();
        $this->assertEquals('http://www.host.com/path', (string) $url);

        $url = new Url('http://www.host.com/path');
        $url->removeLastSlash();
        $this->assertEquals('http://www.host.com/path', (string) $url);
    }

    public function testCanRemoveWWW()
    {
        $url = new Url('http://host.com/path/www.');
        $url->removeWWW();

        $this->assertEquals('http://host.com/path/www.', (string) $url);

        $url = new Url('http://www.host.com/path/www.');
        $url->removeWWW();

        $this->assertEquals('http://host.com/path/www.', (string) $url);
    }

    public function testCanAddWWW()
    {
        $url = new Url('http://host.com/path/www.');
        $url->addWWW();

        $this->assertEquals('http://www.host.com/path/www.', (string) $url);

        $url = new Url('http://www.host.com/path/www.');
        $url->addWWW();

        $this->assertEquals('http://www.host.com/path/www.', (string) $url);
    }

    public function testCanConvertToHttp()
    {
        $url = new Url('http://www.host.net/path/');
        $url->convertToHttp();
        $this->assertEquals('http://www.host.net/path/', (string) $url);

        $url = new Url('https://host.net/path/http/stuff');
        $url->convertToHttp();
        $this->assertEquals('http://host.net/path/http/stuff', (string) $url);
    }

    public function testCanConvertToHttps()
    {
        $url = new Url('http://www.host.net/path/');
        $url->convertToHttps();
        $this->assertEquals('https://www.host.net/path/', (string) $url);

        $url = new Url('https://host.net/path/https/stuff');
        $url->convertToHttps();
        $this->assertEquals('https://host.net/path/https/stuff', (string) $url);
    }

    public function testCanUseOtherSchemes()
    {
        $url = new Url('ftp://www.host.com/path/');
        $this->assertEquals('https://www.host.com/path/', (string) $url);

        $url = new Url('embed://www.host.com/path/');
        $this->assertEquals('https://www.host.com/path/', (string) $url);
    }
}
