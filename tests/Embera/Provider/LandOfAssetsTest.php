<?php
/**
 * LandOfAssetsTest.php
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
 * Test the LandOfAssets Provider
 */
final class LandOfAssetsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://landofassets.com/BenHouston3D/Samples/assets/IridescenceAbalone',
            'https://landofassets.com/BenHouston3D',
        ],
        'invalid_urls' => [
            'https://landofassets.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('LandOfAssets', [ 'width' => 480, 'height' => 270]);
    }
}
