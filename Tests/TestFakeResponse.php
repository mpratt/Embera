<?php
/**
 * TestFakeResponse.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestFakeResponse extends PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $config = array(
            'fake' => array(
                'width' => 420,
                'height' => 315
            ),
            'params' => array(
                'maxwidth' => 0,
                'maxheight' => 0,
            )
        );

        $response = array(
            'provider_name' => 'a provider name',
            'html' => '<div style="height:{height}px;width:{width}px">hi</div>'
        );

        $fakeResponse = new \Embera\FakeResponse($config, $response);
        $response = $fakeResponse->buildResponse();

        $this->assertEquals($response['width'], 420);
        $this->assertEquals($response['height'], 315);
        $this->assertEquals($response['html'], '<div style="height:315px;width:420px">hi</div>');
        $this->assertEquals($response['version'], '1.0');
        $this->assertEquals($response['url'], '');
    }

    public function testResponse2()
    {
        $config = array(
            'fake' => array(
                'width' => 420,
                'height' => 315
            ),
            'params' => array(
                'maxwidth' => 500,
            )
        );

        $response = array(
            'provider_name' => 'a provider name',
            'html' => '<div style="height:{height}px;width:{width}px">hi</div>'
        );

        $fakeResponse = new \Embera\FakeResponse($config, $response);
        $response = $fakeResponse->buildResponse();

        $this->assertEquals($response['width'], 500);
        $this->assertEquals($response['height'], 315);
        $this->assertEquals($response['html'], '<div style="height:315px;width:500px">hi</div>');
        $this->assertEquals($response['version'], '1.0');
        $this->assertEquals($response['url'], '');
    }

    public function testResponse3()
    {
        $config = array(
            'fake' => array(
                'width' => 500,
                'height' => 315,
                'url' => 'http://hi.com',
                'thumb' => 'http://image.com'
            ),
            'params' => array(
                'maxwidth' => 210,
            )
        );

        $response = array(
            'provider_name' => 'a provider name',
            'html' => '<div style="height:{height}px;width:{width}px">hi</div>'
        );

        $fakeResponse = new \Embera\FakeResponse($config, $response);
        $response = $fakeResponse->buildResponse();

        $this->assertEquals($response['width'], 500);
        $this->assertEquals($response['height'], 315);
        $this->assertEquals($response['html'], '<div style="height:315px;width:500px">hi</div>');
        $this->assertEquals($response['version'], '1.0');
        $this->assertEquals($response['url'], 'http://hi.com');
        $this->assertEquals($response['thumb'], 'http://image.com');
    }
}

?>
