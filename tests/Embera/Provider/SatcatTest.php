<?php
/**
 * SatcatTest.php
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
 * Test the Satcat Provider
 */
final class SatcatTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.satcat.com/sats/25544',
            'https://www.satcat.com/sats/58651',
        ],
        'invalid_urls' => [
            'https://www.satcat.com',
            'https://www.satcat.com/sats',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Satcat', [ 'width' => 480, 'height' => 270]);
    }
}
