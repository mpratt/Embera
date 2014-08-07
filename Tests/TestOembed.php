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
        $return = $oembed->getResourceInfo(true, 'dummyurl1', 'dummyurl2');
        $this->assertEquals($return, array());
    }

    public function testResourceInfoOembedJson()
    {
        $value = array('value1' => 10, 'value2' => 30);

        $http = new MockHttpRequest();
        $http->response = json_encode($value);

        $oembed = new \Embera\Oembed($http);
        $return = $oembed->getResourceInfo(true, 'dummyurl', 'dummy_url2');
        unset($return['embera_using_fake']);

        $this->assertEquals($return, $value);
    }

    public function testResourceInfoOembedInvalidJson()
    {
        $value = 'this text is not a json object';

        $http = new MockHttpRequest();
        $http->response = $value;

        $oembed = new \Embera\Oembed($http);
        $return = $oembed->getResourceInfo(true, 'dummyurl', 'dummy_url2');
        $this->assertEquals($return, array());
    }

    public function testUrlConstruction()
    {
        $oembed = new \Embera\Oembed(new MockHttpRequest());
        $reflection = new ReflectionClass('\Embera\Oembed');
        $method = $reflection->getMethod('constructUrl');
        $method->setAccessible(true);

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array('house' => '1', 'value2' => '3', 'format' => 'json')),
                            'http://www.apiurl.com/?house=1&value2=3&format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com', array('width' => '100', 'format' => 'xml')),
                            'http://www.apiurl.com?width=100&format=xml');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/?url=100', array('maxheight' => 400, 'format' => 'json')),
                            'http://www.apiurl.com/?url=100&maxheight=400&format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/hellow/', array('format' => 'json')),
                            'http://www.apiurl.com/hellow/?format=json');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array('height' => '2000')),
                            'http://www.apiurl.com/?height=2000');

        $this->assertEquals($method->invoke($oembed, 'http://www.apiurl.com/', array()),
                            'http://www.apiurl.com/?');
    }
}

?>
