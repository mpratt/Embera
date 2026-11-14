<?php
/**
 * FomrTest.php
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
 * Test the Fomr Provider
 */
final class FomrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fomr.io/s/XS6d35tOon',
        ],
        'invalid_urls' => [
            'https://fomr.io',
            'https://fomr.io/s',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Fomr', [ 'width' => 480, 'height' => 270]);
    }
}
