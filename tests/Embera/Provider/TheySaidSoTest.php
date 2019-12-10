<?php
/**
 * TheySaidSoTest.php
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
 * Test the TheySaidSo Provider
 */
final class TheySaidSoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://theysaidso.com/i/o3moTM0KXcpz3v2Qo80NKweF',
        ],
        'invalid_urls' => [
            'https://theysaidso.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TheySaidSo', [ 'width' => 480, 'height' => 270]);
    }
}
