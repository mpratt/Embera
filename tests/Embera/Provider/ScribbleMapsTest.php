<?php
/**
 * ScribbleMapsTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the ScribbleMaps Provider
 */
final class ScribbleMapsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.scribblemaps.com/maps/view/Road_to_Civil_War_Ethan_Culotta/ZIf2eLM_hn',
            'https://www.scribblemaps.com/maps/view/south_seattle_h4hskc/southseattle',
            'https://www.scribblemaps.com/maps/view/129_Chippen_Lane_Chippendale_Sydney_NSW_2008/M66pPT9JNu',
        ],
        'invalid_urls' => [
            'https://www.scribblemaps.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('ScribbleMaps', [ 'width' => 480, 'height' => 270]);
    }
}
