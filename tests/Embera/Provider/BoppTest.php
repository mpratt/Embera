<?php
/**
 * BoppTest.php
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
 * Test the Bopp Provider
 */
final class BoppTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://i.bopp.tk/c08c1b1i8qk',
        ],
        'invalid_urls' => [
            'https://bopp.tk',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Bopp', [ 'width' => 480, 'height' => 270]);
    }
}
