<?php
/**
 * TestHttpRequest.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestHttpRequest extends PHPUnit_Framework_TestCase
{
    public function testInvalidUrl()
    {
        $this->setExpectedException('Exception');

        $http = new \Embera\HttpRequest();
        $http->fetch('this is an invalid url');
    }

    public function testInvalidUrl2()
    {
        $this->setExpectedException('Exception');

        $http = new \Embera\HttpRequest();
        $http->fetch('http://wwww.invaliddomanstuff.tld');
    }

    public function testFetch()
    {
        $http = new \Embera\HttpRequest();
        $response = $http->fetch('http://www.eltiempo.com/');
        $this->assertContains('<html', $response);
    }
}

?>
