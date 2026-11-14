<?php
/**
 * CastleTest.php
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
 * Test the Castle Provider
 */
final class CastleTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://castle.xyz/d/004Sk5AZz7wY',
        ],
        'invalid_urls' => [
            'https://castle.xyz',
            'https://castle.xyz/d',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Castle', [ 'width' => 480, 'height' => 270]);
    }
}
