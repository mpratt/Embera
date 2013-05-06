<?php
/**
 * TestOembed.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestOembed extends PHPUnit_Framework_TestCase
{
    public function testInvalidResourceInfo()
    {
        $service = new MockService(new \Embera\Url('http://www.cuacuaccuac.com'));
        $service->fakeResponse = array('data' => 'none');

        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $oembed->setService($service);

        $result = $oembed->getResourceInfo();

        $this->assertEquals($result, array());
    }

    public function testInvalidFormatServiceLookup()
    {
        $service = new MockService(new \Embera\Url('http://www.google.com'));
        $service->oEmbedUrl = 'http://www.google.com/';
        $service->oEmbedFormat = 'xml';

        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $oembed->setService($service);

        $result = $oembed->getResourceInfo();

        $this->assertEquals($result, array());
    }

    public function testTranslation()
    {
        $reflection = new ReflectionClass('\Embera\Oembed');
        $method = $reflection->getMethod('translate');
        $method->setAccessible(true);

        $service = new MockService(new \Embera\Url('http://www.google.com'));
        $service->oEmbedUrl = 'http://www.service.com/?url={url}&format={format}&width={width}&height={height}';
        $service->oEmbedFormat = 'json';

        $oembed = new \Embera\Oembed(new \Embera\HttpRequest(), array('width' => 100, 'height' => 200));
        $oembed->setService($service);

        $this->assertEquals($method->invoke($oembed, $service->oEmbedUrl),
                            'http://www.service.com/?url=' . urlencode('http://www.google.com') . '&format=json&width=100&height=200');
    }
}
?>
