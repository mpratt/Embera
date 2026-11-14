<?php
/**
 * TegulaTest.php
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
 * Test the Tegula Provider
 */
final class TegulaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tegula.io/m/11',
            'https://tegula.io/c/1',
            'https://tegula.io/cat.html?model=11',
        ],
        'invalid_urls' => [
            'https://tegula.io',
            'https://tegula.io/cat.html',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Tegula', [ 'width' => 480, 'height' => 270]);
    }
}
