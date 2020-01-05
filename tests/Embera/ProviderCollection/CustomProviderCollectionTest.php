<?php
/**
 * CustomProviderCollectionTest.php
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

final class CustomProviderCollectionTest extends TestCase
{
    protected $urls = [
        'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
        'https://host.com/invalid/url',
        'https://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14',
    ];

    protected $config = [
        'https_only' => false,
        'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
        'maxwidth' => 430,
        'maxheight' => 270,
    ];

    public function testCanFindProviders()
    {
        $collection = new CustomProviderCollection($this->config);
        $collection->registerProvider('Youtube');
        $collection->registerProvider('Flickr');

        $providers = $collection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertContains($p->getProviderName(), [ 'Youtube', 'Flickr' ]);
        }

        $collection = new CustomProviderCollection($this->config);
        $collection->registerProvider('Flickr');

        $providers = $collection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertContains($p->getProviderName(), [ 'Flickr' ]);
        }
    }

}
