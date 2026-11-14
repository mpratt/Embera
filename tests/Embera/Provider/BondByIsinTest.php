<?php
/**
 * BondByIsinTest.php
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
 * Test the BondByIsin Provider
 */
final class BondByIsinTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://bondbyisin.com/bond/US68389XBU81',
            'https://bondbyisin.com/swap-curves?currency=USD',
        ],
        'invalid_urls' => [
            'https://bondbyisin.com',
            'https://bondbyisin.com/about',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('BondByIsin', [ 'width' => 480, 'height' => 270]);
    }
}
