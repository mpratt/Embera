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
    protected $rounds;

    public function testInvalidProviders()
    {
        $oembed = new MockOembed(true, new MockHttpRequest());

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertEmpty($p->getAll(array()));

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertEmpty($p->getAll(null));

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertEmpty($p->getAll('http://www.unknown.com'));

        $urls = array('http://www.unknown.com/path/stuf/?hi=1', 'http://www.thewalkingdead.com/stuff/');
        $p = new \Embera\Providers(array(), $oembed);
        $this->assertEmpty($p->getAll($urls));
    }

    /**
     * This is where it gets nasty.
     *
     * This method is used to validate the behaviour of a Service Provider.
     * All the other methods found down here, are used to test different
     * parts of the service.
     *
     * Now, every service has a test file which extends this class
     * and use this method to validate everything.
     *
     * Why? I had so much duplicated code...
     */
    protected function validateProvider($s, $rounds = 2)
    {
        $this->rounds = (getenv('TRAVIS') ? 1 : $rounds);

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

    protected function validateFakeResponse($service, array $validUrls, array $fakeResponseData)
    {
        $fakeOembed = new MockOembed(true, new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($validUrls as $url)
        {
            $test = new $service($url, array('fake' => array(), 'params' => array()), $fakeOembed);
            $response = $test->fakeResponse();

            $this->assertTrue((count($response) > 5), 'Invalid Response for ' . $url);
            $this->assertContains($fakeResponseData['html'], $response['html'], 'Response is not ' . $fakeResponseData['html']. ' in ' . $url);
            $this->assertEquals($fakeResponseData['type'], $response['type'], 'Response type is not ' . $fakeResponseData['type'] . ' on ' . $url);
        }

        for ($i = 0; $i < $this->rounds; $i++)
        {
            $url = $validUrls[mt_rand(0, (count($validUrls) - 1))];
            $oembed = new \Embera\Oembed(true, new \Embera\HttpRequest());

            $test = new $service($url, array('oembed' => true, 'fake' => array(), 'params' => array()), $oembed);
            $result1 = $test->getInfo();

            if (!isset($result1['embera_using_fake']))
            {
                $this->markTestIncomplete($service . ': Embera_using_fake index not defined on ' . $url . ' - Probably the response took too long');
                return ;
            }

            $this->assertTrue(isset($result1['html']), 'Funky response (no html) from ' . $url);
            $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
            $this->assertTrue(!empty($result1['html']), 'Empty Html on ' . $url);

            $oembed = new \Embera\Oembed(false, new \Embera\HttpRequest());
            $test = new $service($url, array('oembed' => false, 'fake' => array(), 'params' => array()), $oembed);
            $result2 = $test->getInfo();

            $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
            $this->assertTrue(!empty($result2['html']), 'Empty Html on ' . $url);

            similar_text($result1['html'], $result2['html'], $percent);
            $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off');
        }
    }

    protected function validatePrivateUrlResponse($service, array $privateUrls)
    {
        $oembed = new \Embera\Oembed(true, new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($privateUrls as $url)
        {
            $test = new $service($url, array('fake' => array(), 'params' => array()), $oembed);
            $this->assertEmpty($test->getInfo(), $service . ': Invalid response from a private url ' . print_r($test->getInfo(), true));
        }
    }

    protected function validateDetection($s, array $validUrls, array $invalidUrls)
    {
        $oembed = new MockOembed(true, new MockHttpRequest());

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll($validUrls), $s . ' The valid Urls dont seem to be detected correctly');

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(array_merge($validUrls, $invalidUrls)), $s . ' There is at least one invalid url recognized as valid');

        $p = new \Embera\Providers(array(), $oembed);
        $this->assertCount(1, $p->getAll($validUrls[mt_rand(0, (count($validUrls) - 1))]), $s . ' One Correct url seems to be invalid');
    }

    protected function validateWrongUrlResponse($service, $url)
    {
        try {
            $oembed = new MockOembed(true, new MockHttpRequest());
            $service = '\Embera\Providers\\' . $service;

            new $service($url, array('fake' => array(), 'params' => array()), $oembed);
        } catch (InvalidArgumentException $e) { return true; }

        return false;
    }

    protected function validateRealResponse($service, array $validUrls)
    {
        $oembed = new \Embera\Oembed(true, new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        for ($i = 0; $i < $this->rounds; $i++)
        {
            $url = $validUrls[mt_rand(0, (count($validUrls) - 1))];

            $test = new $service($url, array('oembed' => true, 'fake' => array(), 'params' => array()), $oembed);
            $result = $test->getInfo();

            if (!isset($result['embera_using_fake']))
            {
                $this->markTestIncomplete($service . ': Embera_using_fake index not defined on ' . $url . ' - Probably the response took too long - Using url ' . $test->getUrl());
                return ;
            }

            $this->assertTrue($result['embera_using_fake'] == 0, $service . ': Using Fake on ' . $url);
        }
    }

    protected function validateUrlNormalization($service, array $normalizeUrls)
    {
        $oembed = new MockOembed(true, new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($normalizeUrls as $given => $expected)
        {
            $test = new $service($given, array('fake' => array(), 'params' => array()), $oembed);
            $this->assertEquals($test->getUrl(), $expected);
        }
    }
}
?>
