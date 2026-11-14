<?php
/**
 * VizzloTest.php
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
 * Test the Vizzlo Provider
 */
final class VizzloTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vizzlo.com/d/f4PJg6Y8R4uDjhy-HyqzOg',
            'https://eu.vizzlo.com/d/SeBfOMKfTK-AenPxoCA6-g',
        ],
        'invalid_urls' => [
            'https://vizzlo.com',
            'https://vizzlo.com/d',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Vizzlo', [ 'width' => 480, 'height' => 270]);
    }
}
