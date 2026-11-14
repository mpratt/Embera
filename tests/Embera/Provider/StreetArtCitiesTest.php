<?php
/**
 * StreetArtCitiesTest.php
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
 * Test the StreetArtCities Provider
 */
final class StreetArtCitiesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://streetartcities.com/markers/72036965-cea9-48e4-a4b3-5612585a8f6f',
        ],
        'invalid_urls' => [
            'https://streetartcities.com',
            'https://streetartcities.com/markers',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('StreetArtCities', [ 'width' => 480, 'height' => 270]);
    }
}
