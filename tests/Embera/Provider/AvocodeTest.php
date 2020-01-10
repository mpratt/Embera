<?php
/**
 * AvocodeTest.php
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
 * Test the Avocode Provider
 */
final class AvocodeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.avocode.com/view/a851fc49602446be8c1ef6e5dc3845d8/33250729/comments/',
        ],
        'invalid_urls' => [
            'https://avocode.com/',
            'https://avocode.com/view/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Avocode', [ 'width' => 480, 'height' => 270]);
    }
}
