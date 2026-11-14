<?php
/**
 * GW2FashionsTest.php
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
 * Test the GW2Fashions Provider
 */
final class GW2FashionsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://gw2fashions.com/fashion/2b',
        ],
        'invalid_urls' => [
            'https://gw2fashions.com',
            'https://gw2fashions.com/fashion',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GW2Fashions', [ 'width' => 480, 'height' => 270]);
    }
}
