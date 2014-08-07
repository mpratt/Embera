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
    /** @var array with urls */
    protected $urls;

    public function testEmptyOrInvalidProviders()
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertEmpty($p->getAll(array()));

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertEmpty($p->getAll(null));

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertEmpty($p->getAll('http://www.unknown.com'));

        $urls = array('http://www.unknown.com/path/stuf/?hi=1', 'http://www.thewalkingdead.com/stuff/');
        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertEmpty($p->getAll($urls));
    }

    protected function getRandomUrls(array $urls = array(), $count = 1)
    {
        if ($count >= count($urls)) {
            return $urls;
        }

        shuffle($urls);
        return array_slice($urls, 0, $count);
    }

    /**
     * This is where it gets nasty.
     *
     * This method is used to validate the behaviour of a Service Provider.
     * All the other methods found down here, are used to test different
     * parts of the service.
     *
     * Now, every service has a test file which extends this class
     * and uses this method to validate everything.
     *
     * Why? I had so much duplicated code...
     * I know it looks ugly, but, its more convenient.
     *
     * @large
     */
    protected function validateProvider($s)
    {
        if (empty($this->urls)) {
            throw new Exception('No urls specified for the service ' . $s);
        }

        // Use all the available urls
        $rounds = (defined('FULL_TEST') && FULL_TEST ? 1000 : 1);

        $this->validateDetection($s, $this->urls['valid'], $this->urls['invalid']);
        $this->validateRealResponse($s, $this->getRandomUrls($this->urls['valid'], $rounds));

        if (!empty($this->urls['normalize'])) {
            $this->validateUrlNormalization($s, $this->urls['normalize']);
        }

        if (!empty($this->urls['fake'])) {
            $this->validateFakeResponse($s, $this->getRandomUrls($this->urls['valid'], $rounds), $this->urls['fake']);
        }

        if (!empty($this->urls['private'])) {
            $this->validatePrivateUrlResponse($s, $this->urls['private']);
        }

        $this->validateWrongUrlResponse($s, $this->getRandomUrls($this->urls['invalid'], 3));
    }

    /**
     * Checks if all valid urls are correctly detected
     * @medium
     */
    protected function validateDetection($s, array $validUrls, array $invalidUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertCount(count($validUrls), $p->getAll($validUrls), $s . ' The valid Urls dont seem to be detected correctly');

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertCount(count($validUrls), $p->getAll(array_merge($validUrls, $invalidUrls)), $s . ' There is at least one invalid url recognized as valid');

        $p = new \Embera\Providers(array('oembed' => true), $oembed);
        $this->assertCount(1, $p->getAll($validUrls[mt_rand(0, (count($validUrls) - 1))]), $s . ' One Correct url seems to be invalid');
    }

    /**
     * Validates the response for an array of urls
     * @large
     */
    protected function validateRealResponse($service, array $validUrls)
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($validUrls as $url) {
            $test = new $service($url, array(
                'oembed' => true,
                'fake' => array(),
                'params' => array()
            ), $oembed);

            $result = $test->getInfo();

            if (!isset($result['embera_using_fake'])) {
                $this->markTestIncomplete($service . ': Embera_using_fake index not defined on ' . $url . ' - Probably the response took too long - Using url ' . $test->getUrl());
                return ;
            }

            $this->assertTrue($result['embera_using_fake'] == 0, $service . ': Using Fake on ' . $url);
        }
    }

    /**
     * Validates that a url on this service is correctly normalized
     * @medium
     */
    protected function validateUrlNormalization($service, array $normalizeUrls)
    {
        $oembed = new MockOembed(new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($normalizeUrls as $given => $expected) {
            $test = new $service($given, array('oembed' => false, 'fake' => array(), 'params' => array()), $oembed);
            $this->assertEquals($test->getUrl(), $expected);
        }
    }

    /**
     * Validates a fake response
     * @large
     */
    protected function validateFakeResponse($service, array $validUrls, array $fakeResponseData)
    {
        $fakeOembed = new MockOembed(new MockHttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($validUrls as $url) {
            $test = new $service($url, array('fake' => array(), 'params' => array()), $fakeOembed);
            $response = $test->fakeResponse();

            $this->assertTrue((count($response) > 2), 'Invalid Fake Response for ' . $url . ' - Debug: ' . print_r($response, true));
            $this->assertContains($fakeResponseData['html'], $response['html'], 'Response is not ' . $fakeResponseData['html']. ' in ' . $url);
            $this->assertEquals($fakeResponseData['type'], $response['type'], 'Response type is not ' . $fakeResponseData['type'] . ' on ' . $url);

            // Do a real test and comparition
            $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
            $test = new $service($url, array('oembed' => true, 'fake' => array(), 'params' => array()), $oembed);
            $result1 = $test->getInfo();

            if (!isset($result1['embera_using_fake'])) {
                $this->markTestIncomplete($service . ': Embera_using_fake index not defined on ' . $url . ' - Probably the response took too long');
                return ;
            }

            $this->assertTrue(isset($result1['html']), 'Funky response (no html) from ' . $url);
            $this->assertTrue($result1['embera_using_fake'] == 0, 'Using fake on ' . $url);
            $this->assertTrue(!empty($result1['html']), 'Empty Html on ' . $url);

            $this->assertContains($fakeResponseData['html'], $result1['html'], 'Response is not ' . $fakeResponseData['html']. ' in ' . $url);
            $this->assertEquals($fakeResponseData['type'], $result1['type'], 'Response type is not ' . $fakeResponseData['type'] . ' on ' . $url);

            $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
            $test = new $service($url, array('oembed' => false, 'fake' => array(), 'params' => array()), $oembed);
            $result2 = $test->getInfo();

            $this->assertTrue($result2['embera_using_fake'] == 1, 'Not Using fake on ' . $url);
            $this->assertTrue(!empty($result2['html']), 'Empty Html on ' . $url);

            similar_text($result1['html'], $result2['html'], $percent);
            $this->assertTrue($percent >= 70, 'The Fake/Real response for ' . $url . ' seem a little off | %' . $percent);

            $this->assertTrue(isset($result1['type']), 'No type response on ' . $url);
            $this->assertEquals(strtolower($result1['type']), strtolower($fakeResponseData['type']), 'Funky type response from ' . $url);
        }
    }

    /**
     * Validate urls that have a private response
     * @large
     */
    protected function validatePrivateUrlResponse($service, array $privateUrls)
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $service = '\Embera\Providers\\' . $service;

        foreach ($privateUrls as $url) {
            $test = new $service($url, array('oembed' => true, 'fake' => array(), 'params' => array()), $oembed);
            $this->assertEmpty($test->getInfo(), $service . ': Invalid response from a private url ' . print_r($test->getInfo(), true));
        }
    }

    /**
     * Validates a response from an invalid url for the current service
     * @large
     */
    protected function validateWrongUrlResponse($service, array $urls)
    {
        $service = '\Embera\Providers\\' . $service;
        $oembed = new MockOembed(new MockHttpRequest());

        foreach ($urls as $url) {
            try {
                new $service($url, array(
                    'oembed' => true,
                    'fake' => array(),
                    'params' => array()
                ), $oembed);

                $this->assertTrue(false, $service . ': The url ' . $url . ' doesnt seem to be invalid');
            } catch (InvalidArgumentException $e) {
                // just keep the count
                $this->assertTrue(true);
            }
        }
    }
}
?>
