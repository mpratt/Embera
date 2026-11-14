<?php
/**
 * EmbasesTest.php
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
 * Test the Embases Provider
 */
final class EmbasesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.embases.com/e/142fa3242a5f5ed7db3821e7c8d349ec738e8facf7905e32d987df4165ccb3d6',
        ],
        'invalid_urls' => [
            'https://www.embases.com',
            'https://www.embases.com/e',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Embases', [ 'width' => 480, 'height' => 270]);
    }
}
