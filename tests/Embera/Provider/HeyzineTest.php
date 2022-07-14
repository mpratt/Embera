<?php
/**
 * HeyzineTest.php
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
 * Test the Heyzine Provider
 */
final class HeyzineTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://heyzine.com/flip-book/dce36e099f.html',
        ],
        'invalid_urls' => [
            'https://heyzine.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Heyzine', [ 'width' => 480, 'height' => 270]);
    }
}
