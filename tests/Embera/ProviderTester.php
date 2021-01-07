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

namespace Embera;

use Embera\Http\HttpClient;
use Embera\Http\OembedClient;
use Embera\ProviderCollection\DefaultProviderCollection;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ProviderTester extends TestCase
{
    /** @var array with urls */
    protected $tasks;

    /**
     * Returns an array with random data from an array
     *
     * @param array $data
     * @param int $count
     *
     * @return array
     *
     */
    protected function getRandomDataFrom(array $data, $count = 1)
    {
        if ($count >= count($data)) {
            return $data;
        }

        shuffle($data);
        return array_slice($data, 0, $count);
    }

    /**
     * This is where it gets nasty.
     *
     * This method is used to validate the behaviour of a  Provider.
     * All the other methods found down here, are used to test different
     * parts of the provider
     *
     * Now, every provider has a test file which extends this class
     * and uses this method to validate everything.
     *
     * Why? I had so much duplicated code...
     * I know it looks ugly, but, its more convenient.
     *
     * @param string $p The provider Name
     * @param array $config Additional config options
     * @return void
     *
     * @large
     */
    protected function validateProvider($p, array $config = [])
    {
        $rounds = 1000;
        $validateRealResponse = true;
        if ((bool) getenv('TRAVIS')) {
            $rounds = 1;
            $validateRealResponse = false;
        }

        if (empty($this->tasks)) {
            throw new \Exception(sprintf('The Provider %s doesnt have tasks', $p));
        }

        $this->validateUrlDetection($p, $this->tasks, $config);
        $this->validateCollectionDetection($p, $this->tasks, $config);

        if (!empty($this->tasks['normalize_urls'])) {
            $this->validateUrlNormalization($p, $this->tasks['normalize_urls'], $config);
        }

        if (!empty($this->tasks['fake_response'])) {
            $this->validateFakeResponse($p, $this->tasks, $rounds, $config);
        }

        if ($validateRealResponse) {
            $this->validateRealResponse($p, $this->tasks, $rounds, $config);
        }
    }

    /**
     * Checks if the main library detects this provider
     *
     * @param string $providerName Provider Name
     * @param array $tasks
     * @param array $config
     * @return void
     *
     * @medium
     */
    protected function validateCollectionDetection($providerName, array $tasks, array $config = [])
    {
        $config = array_merge([
            'https_only' => false,
            'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
            'maxwidth' => 430,
            'maxheight' => 270,
        ], $config);

        $collection = new DefaultProviderCollection($config);
        $providers = $collection->findProviders($tasks['valid_urls']);

        $this->assertNotEmpty($providers, 'Could not detect urls from the main Embera library.');
        foreach ($providers as $p) {
            $this->assertEquals($p->getProviderName(), $providerName);
        }
    }

    /**
     * Checks if all valid urls are correctly detected
     *
     * @param string $providerName Provider Name
     * @param array $tasks
     * @param array $config
     * @return void
     *
     * @medium
     */
    protected function validateUrlDetection($providerName, array $tasks, array $config = [])
    {
        $validCount = 0;
        $validUrlCount = count($tasks['valid_urls']);

        foreach ($tasks['valid_urls'] as $valid) {
            $reflection = new ReflectionClass('Embera\Provider\\' . $providerName);
            $provider = $reflection->newInstance($valid, $config);
            if ($provider->validateUrl($provider->getUrl(false))) {
                $validCount++;
            } else {
                $this->fail(sprintf('The url %s was not recognized as valid', $valid));
            }

        }

        $this->assertEquals($validUrlCount, $validCount, sprintf('The provider %s has problem detecting valid urls.', $providerName));

        $validCount = 0;
        foreach (array_merge($tasks['valid_urls'], $tasks['invalid_urls']) as $mixed) {
            $reflection = new ReflectionClass('Embera\Provider\\' . $providerName);
            $provider = $reflection->newInstance($mixed, $config);
            if ($provider->validateUrl($provider->getUrl(false))) {
                $validCount++;
            }
        }

        $this->assertEquals($validUrlCount, $validCount, sprintf('The provider %s is detecting wrong urls as valid.', $providerName));
    }

    /**
     * Validates that a url on this provider is correctly normalized
     *
     * @param string $providerName
     * @param array $data
     * @param array $config
     * @return void
     *
     * @medium
     */
    protected function validateUrlNormalization($providerName, array $data, array $config = [])
    {
        $reflection = new ReflectionClass('Embera\Provider\\' . $providerName);
        foreach ($data as $givenUrl => $expectedUrl) {
            $provider = $reflection->newInstance($givenUrl, $config);
            $normalizedUrl = $provider->getUrl();

            $this->assertEquals($expectedUrl, $normalizedUrl, sprintf('We expected %s and were given %s', $expectedUrl, $normalizedUrl));
        }
    }

    /**
     * Validates a fake response
     *
     * @param string $providerName
     * @param array $tasks
     * @param int $rounds
     * @param array $config
     *
     * @return void
     *
     * @large
     */
    protected function validateFakeResponse($providerName, array $tasks, $rounds, array $config = [])
    {
        // Percentage accepted for fake response similarity
        $similarMinimumThreshold = 80;

        $urls = $this->getRandomDataFrom($tasks['valid_urls'], $rounds);

        $fakeOembedClient = new OembedClient(array_merge($config, [
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
        ]), new HttpClient());

        $realOembedClient = new OembedClient(array_merge($config, [
            'fake_responses' => Embera::DISABLE_FAKE_RESPONSES,
        ]), new HttpClient());

        foreach ($urls as $url) {
            $reflection = new ReflectionClass('Embera\Provider\\' . $providerName);
            $provider = $reflection->newInstance($url, $config);

            $fakeResponse = $fakeOembedClient->getResponseFrom($provider);

            $this->assertNotEmpty($fakeResponse['html'], sprintf(
                'Fake Response doesnt have html data on url %s', $url
            ));

            $this->assertStringContainsStringIgnoringCase($tasks['fake_response']['html'], $fakeResponse['html'], sprintf(
                'Could not determine the existance of %s in the url %s. The response was %s',
                $tasks['fake_response']['html'],
                $url,
                $fakeResponse['html']
            ));

            $types = $tasks['fake_response']['type'];
            if (strpos($types, '|') !== false) {
                $typesArray = explode('|', $types);
                $this->assertContains($fakeResponse['type'], $typesArray, sprintf(
                    'Fake Response is type %s but we only are allowing %s',
                    $fakeResponse['type'], $types
                ));
            } else {
                $this->assertEquals($types, $fakeResponse['type'], sprintf(
                    'Fake Response type is not type %s on %s, %s given',
                    $types,
                    $url,
                    $fakeResponse['type']
                ));
            }

            $this->assertEquals(1, $fakeResponse['embera_using_fake_response'], sprintf(
                'Fake response flag is not correct. Expecting "1", recieved "%s" on url %s',
                $fakeResponse['embera_using_fake_response'], $url
            ));

            $realResponse = $realOembedClient->getResponseFrom($provider);
            if (!isset($realResponse['embera_using_fake_response'])) {
                $this->markTestIncomplete(sprintf(
                    'The Provider %s doesnt define the embera_using_fake_response on url %s. Probably the response took to long',
                    $providerName, $url
                ));

                return ;
            }

            $this->assertEquals(0, $realResponse['embera_using_fake_response'], sprintf(
                'Fake response flag is not correct. Expecting "0", recieved "%s" on url %s',
                $realResponse['embera_using_fake_response'], $url
            ));

            $this->assertNotEmpty($realResponse['html'], sprintf(
                'Real Response doesnt have html data on url %s', $url
            ));

            if (!empty($realResponse['type']) && strpos($types, '|') === false) {
                $this->assertEquals(strtolower($realResponse['type']), strtolower($fakeResponse['type']), sprintf(
                    'The real response is type %s and not %s',
                    $realResponse['type'],
                    $fakeResponse['type']
                ));
            }

            similar_text($fakeResponse['html'], $realResponse['html'], $percent);
            $this->assertTrue($percent >= $similarMinimumThreshold, sprintf(
                'The Fake/Real response for url %s is off. The current threshold is %s and we got %s. Real response: "%s" | Fake response: "%s"',
                $url, $similarMinimumThreshold, $percent, $realResponse['html'], $fakeResponse['html']
            ));
        }

    }

    /**
     * Validates the real response from a given provider
     *
     * @param string $providerName
     * @param array $tasks
     * @param int $rounds
     * @param array $config
     *
     * @return void
     *
     * @large
     */
    protected function validateRealResponse($providerName, array $tasks, $rounds, array $config = [])
    {
        $urls = $this->getRandomDataFrom($tasks['valid_urls'], $rounds);
        $oembedClient = new OembedClient(array_merge($config, [
            'fake_responses' => Embera::DISABLE_FAKE_RESPONSES,
        ]), new HttpClient());

        foreach ($urls as $url) {
            $reflection = new ReflectionClass('Embera\Provider\\' . $providerName);
            $provider = $reflection->newInstance($url, $config);

            $response = $oembedClient->getResponseFrom($provider);
            if (!isset($response['embera_using_fake_response'])) {
                $this->markTestIncomplete(sprintf(
                    'The Provider %s doesnt define the embera_using_fake_response on url %s. Probably the response took to long',
                    $providerName, $url
                ));

                return ;
            }

            $this->assertEquals(0, $response['embera_using_fake_response'], sprintf(
                'Fake response flag is not correct. Expecting "0", recieved "%s" on url %s',
                $response['embera_using_fake_response'], $url
            ));
        }
    }

}
