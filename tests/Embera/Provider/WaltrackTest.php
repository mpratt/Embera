<?php
/**
 * WaltrackTest.php
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
 * Test the Waltrack Provider
 */
final class WaltrackTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://waltrack.net/product/532025814',
        ],
        'invalid_urls' => [
            'https://waltrack.net/unknown',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Waltrack', [ 'width' => 480, 'height' => 270]);
    }
}
