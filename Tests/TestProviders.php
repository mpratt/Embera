<?php
/**
 * TestProviders.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestProviders extends PHPUnit_Framework_TestCase
{
    // List of Providers
    protected $services = array(
        'Youtube',
        'Flickr',
        'Vimeo',
        'DailyMotion',
        'Viddler',
        'Qik',
        'Revision3',
        'Hulu',
        'CollegeHumor',
        'Jest',
        'MyOpera',
        'Twitter',
        'Deviantart',
    );

    public function testInvalidProviders()
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers(array(), array(), $oembed);
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers(null, array(), $oembed);
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers('http://www.unknown.com', array(), $oembed);
        $this->assertEmpty($p->getAll());

        $urls = array('http://www.unknown.com/path/stuf/?hi=1', 'http://www.thewalkingdead.com/stuff/');
        $p = new \Embera\Providers($urls, array(), $oembed);
        $this->assertEmpty($p->getAll());
    }

    public function testAllProviders()
    {
        foreach ($this->services as $s)
        {
            $validUrls   = UrlList::get($s);
            $invalidUrls = UrlList::get($s, 'invalid');

            $this->validateDetection($s, $validUrls, $invalidUrls);
            $this->validateRealResponse($s, $validUrls);

            if ($normalize = UrlList::get($s, 'normalize'))
                $this->validateUrlNormalization($s, $normalize);

            if ($fake = UrlList::get($s, 'fake'))
                $this->validateFakeResponse($s, $validUrls, $fake);

            if ($private = UrlList::get($s, 'private'))
                $this->validatePrivateUrlResponse($s, $private);

            $url = $invalidUrls[mt_rand(0, (count($invalidUrls) - 1))];
            $this->assertTrue($this->validateWrongUrlResponse($s, $url), $s . ': The url ' . $url . ' doesnt seem to be invalid');
        }
    }

    protected function validateFakeResponse($service, array $validUrls, array $fakeResponseData, $rounds = 2)
    {
        $fakeOembed = new MockOembed(new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($validUrls as $url)
        {
            $test = new $service($url, array(), $fakeOembed);
            $response = $test->fakeResponse();

            $this->assertTrue((count($response) > 5), 'Invalid Response for ' . $url);
            $this->assertContains($fakeResponseData['html'], $response['html'], 'Response is not ' . $fakeResponseData['html']. ' in ' . $url);
            $this->assertEquals($fakeResponseData['type'], $response['type'], 'Response type is not ' . $fakeResponseData['type'] . ' on ' . $url);
        }

        for ($i = 0; $i < $rounds; $i++)
        {
            $url = $validUrls[mt_rand(0, (count($validUrls) - 1))];
            $oembed = new \Embera\Oembed(new \Embera\HttpRequest());

            $test = new $service($url, array('oembed' => true), $oembed);
            $result1 = $test->getInfo();

            $this->assertTrue(isset($result1['embera_using_fake']), 'Funky response (no embera_using_fake) from ' . $url);
            $this->assertTrue(isset($result1['html']), 'Funky response (no html) from ' . $url);

            $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
            $this->assertTrue(!empty($result1['html']), 'Empty Html on ' . $url);

            $test = new $service($url, array('oembed' => false), $oembed);
            $result2 = $test->getInfo();

            $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
            $this->assertTrue(!empty($result2['html']), 'Empty Html on ' . $url);

            similar_text($result1['html'], $result2['html'], $percent);
            $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off');
        }
    }

    protected function validatePrivateUrlResponse($service, array $privateUrls)
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($privateUrls as $url)
        {
            $test = new $service($url, array(), $oembed);
            $this->assertEmpty($test->getInfo(), $service . ': Invalid response from a private url ' . print_r($test->getInfo(), true));
        }
    }

    protected function validateDetection($s, array $validUrls, array $invalidUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers($validUrls, array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), $s . ' The valid Urls dont seem to be detected correctly');

        $p = new \Embera\Providers(array_merge($validUrls, $invalidUrls), array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(), $s . ' There is at least one invalid url recognized as valid');

        $p = new \Embera\Providers($validUrls[mt_rand(0, (count($validUrls) - 1))], array(), $oembed);
        $this->assertCount(1, $p->getAll(), $s . ' One Correct url seems to be invalid');
    }

    protected function validateWrongUrlResponse($service, $url)
    {
        try {
            $oembed = new MockOembed(new MockHttpRequest());

            $service = '\Embera\Providers\\' . $service;

            new $service($url, array(), $oembed);
        } catch (InvalidArgumentException $e) { return true; }

        return false;
    }

    protected function validateRealResponse($service, array $validUrls, $rounds = 2)
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        for ($i = 0; $i < $rounds; $i++)
        {
            $url = $validUrls[mt_rand(0, (count($validUrls) - 1))];

            $test = new $service($url, array('oembed' => true), $oembed);
            $result = $test->getInfo();

            $this->assertTrue($result['embera_using_fake'] == 0, 'Using Fake on ' . $url);
        }
    }

    protected function validateUrlNormalization($service, array $normalizeUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($normalizeUrls as $given => $expected)
        {
            $test = new $service($given, array(), $oembed);
            $this->assertEquals($test->getUrl(), $expected);
        }
    }
}
?>
