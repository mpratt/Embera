<?php
/**
 * SlimProviderCollectionTest.php
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

final class SlimProviderCollectionTest extends TestCase
{
    protected $urls = [
        'https://www.kickstarter.com/projects/wilderwoventarot/the-wilderwoven-tarot',
        'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
        'https://repl.it/repls/GloriousMotherlyButton',
    ];

    protected $config = [
        'https_only' => false,
        'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
        'maxwidth' => 430,
        'maxheight' => 270,
    ];

    public function testCanFindProviders()
    {
        $collection = new SlimProviderCollection($this->config);
        $providers = $collection->findProviders($this->urls);

        foreach ($providers as $p) {
            $this->assertContains($p->getProviderName(), [ 'Youtube', 'Kickstarter' ]);
        }
    }

}
