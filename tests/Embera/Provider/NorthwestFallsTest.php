<?php
/**
 * NorthwestFallsTest.php
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
 * Test the NorthwestFalls Provider
 */
final class NorthwestFallsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://northlink.cc/t/wgcjgvbsht9gt',
        ],
        'invalid_urls' => [
            'https://northlink.cc',
            'https://northlink.cc/t',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NorthwestFalls', [ 'width' => 480, 'height' => 270]);
    }
}
