<?php
/**
 * NamcheyTest.php
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
 * Test the Namchey Provider
 */
final class NamcheyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://namchey.com/itineraries/gosainkunda-5ddfe1cf820a6e64368efe21',
            'https://namchey.com/itineraries/gufapokhari-5ddf667ad7234a5b1c3b0dd0',
            'https://namchey.com/itineraries/king-of-the-hills-bethanchok-narayanthan',
        ],
        'invalid_urls' => [
            'https://namchey.com/',
            'https://namchey.com/itineraries/',
            'https://namchey.com/itineraries/king-of-the-hills-bethanchok-narayanthan/other-stuff',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Namchey', [ 'width' => 480, 'height' => 270]);
    }
}
