<?php
/**
 * LocalVoicesNetworkTest.php
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
 * Test the LocalVoicesNetwork Provider
 */
final class LocalVoicesNetworkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embed.lvn.org/watch?hid=3036839',
        ],
        'invalid_urls' => [
            'https://embed.lvn.org/watch/3036839',
            'https://lvn.org',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('LocalVoicesNetwork is returning errors on correct urls. Deleting if continues (2023-11-08)');
        // $this->validateProvider('LocalVoicesNetwork', [ 'width' => 480, 'height' => 270]);
    }
}
