<?php
/**
 * DefaultProviderCollectionTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\ProviderCollection;

use PHPUnit\Framework\TestCase;
use Embera\Embera;

final class DefaultProviderCollectionTest extends TestCase
{
    protected $urls = [
        'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
        'https://m.youtube.com/watch?v=mghhLqu31cQ',
        'https://host.com/invalid/url'
    ];

    protected $config = [
        'https_only' => false,
        'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
        'maxwidth' => 430,
        'maxheight' => 270,
    ];

    public function testCanFindProviders()
    {
        $collection = new DefaultProviderCollection($this->config);
        $providers = $collection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertContains($p->getProviderName(), [ 'Youtube']);
        }
    }

    public function testCanFindProvidersWithHttpsSupport()
    {
        $collection = new DefaultProviderCollection(array_merge($this->config, ['https_only' => true]));
        $providers = $collection->findProviders($this->urls);
        foreach ($providers as $p) {
            $this->assertTrue($p->hasHttpsSupport());
        }
    }

    public function testUnsupportedUrlsResponse()
    {
        $collection = new DefaultProviderCollection($this->config);
        $providers = $collection->findProviders([
            'https://host.com/unsupported/host/url',
            'https://oembed.com/#section1',
            'https://www.youtube.com/feed/subscriptions',
        ]);

        $this->assertEmpty($providers);
    }

    public function testCanFilterByProviderName()
    {
        $collection = new DefaultProviderCollection($this->config);
        $newCollection = $collection->filter('Youtube');

        $providers = $newCollection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertEquals($p->getProviderName(), 'Youtube');
        }
    }

    public function testCanFilterByClosure()
    {
        $collection = new DefaultProviderCollection($this->config);
        $newCollection = $collection->filter(static function ($elem) {
            return (in_array($elem, ['Youtube', 'Vimeo']));
        });

        $providers = $newCollection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertContains($p->getProviderName(), ['Youtube', 'Vimeo']);
        }
    }

    public function testCanReadInputWithoutUrls()
    {
        $collection = new DefaultProviderCollection($this->config);
        $providers = $collection->findProviders('This is a text without urls.');
        $this->assertEmpty($providers);
    }

    public function testCanDetectUrlsInString()
    {
        $collection = new DefaultProviderCollection($this->config);
        $providers = $collection->findProviders(implode(' <br> ', $this->urls));
        $this->assertTrue(count($providers) > 0);
    }

    public function testCanAddNewProviders()
    {
        $collection = new DefaultProviderCollection($this->config);

        // Remove all Providers
        $collection = $collection->filter(static function ($elem) {
            return false;
        });

        $providers = $collection->findProviders($this->urls);
        $this->assertCount(0, $providers);

        // Add Only Youtube
        $collection->addProvider('youtube.com', 'Embera\Provider\Youtube');
        $providers = $collection->findProviders($this->urls);
        $this->assertTrue(count($providers) > 0);
        foreach ($providers as $p) {
            $this->assertEquals($p->getProviderName(), 'Youtube');
        }
    }
}
