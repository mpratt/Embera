<?php
/**
 * SpreakerTest.php
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
 * Test the Spreaker Provider
 */
final class SpreakerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.spreaker.com/user/computerhoy',
        ],
        'invalid_urls' => [
            'https://www.spreaker.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spreaker', [ 'width' => 480, 'height' => 270]);
    }
}
