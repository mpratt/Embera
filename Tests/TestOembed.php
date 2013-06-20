<?php
/**
 * TestOembed.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestOembed extends PHPUnit_Framework_TestCase
{
    public function testResourceInfoOembedDisabled()
    {
        $oembed = new \Embera\Oembed(new MockHttpRequest());
        $return = $oembed->getResourceInfo('dummyurl1', 'dummyurl2', array('oembed' => false));
        $this->assertEquals($return, array());
    }

    public function testResourceInfoOembedJson()
    {
        $value = array('value1' => 10, 'value2' => 30);

        $http = new MockHttpRequest();
        $http->response = json_encode($value);

        $oembed = new \Embera\Oembed($http);
        $return = $oembed->getResourceInfo('dummyurl', 'dummy_url2', array('oembed' => true));
        unset($return['embera_using_fake']);

        $this->assertEquals($return, $value);
    }

    public function testResourceInfoOembedInvalidJson()
    {
        $value = 'this text is not a json object';

        $http = new MockHttpRequest();
        $http->response = $value;

        $oembed = new \Embera\Oembed($http);
        $return = $oembed->getResourceInfo('dummyurl', 'dummy_url2', array('oembed' => true));
        $this->assertEquals($return, array());
    }

    public function testFakeResponseBuilder()
    {
        $oembed = new \Embera\Oembed(new MockHttpRequest());
        $return = $oembed->buildFakeResponse();

        $this->assertTrue(is_array($return));
        $this->assertTrue((count($return) > 0));
    }

    public function testFakeResponseBuilder2()
    {
        $oembed = new \Embera\Oembed(new MockHttpRequest());
        $return = $oembed->buildFakeResponse(array('value1' => 10, 'value2' => 30, 'title' => 'Yay'));

        $this->assertTrue(is_array($return));
        $this->assertTrue((count($return) > 3));
        $this->assertEquals(10, $return['value1']);
        $this->assertEquals(30, $return['value2']);
        $this->assertEquals('Yay', $return['title']);
    }

    public function testUrlConstruction()
    {
        $oembed = new \Embera\Oembed(new MockHttpRequest());
        $reflection = new ReflectionClass('\Embera\Oembed');
        $method = $reflection->getMethod('constructUrl');
        $method->setAccessible(true);

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array('house' => '1', 'value2' => '3', 'format' => 'json')),
                            'http://www.apiurl.com/?format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com', array('width' => '100', 'format' => 'xml')),
                            'http://www.apiurl.com?format=xml&maxwidth=100');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/?url=100', array('maxheight' => 400, 'format' => 'json')),
                            'http://www.apiurl.com/?url=100&maxheight=400&format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/hellow/', array('format' => 'json')),
                            'http://www.apiurl.com/hellow/?format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array('height' => '2000')),
                            'http://www.apiurl.com/?maxheight=2000');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array()),
                            'http://www.apiurl.com/');
    }
}

?>
