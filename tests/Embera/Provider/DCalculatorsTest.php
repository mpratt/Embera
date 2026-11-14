<?php
/**
 * DCalculatorsTest.php
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
 * Test the DCalculators Provider
 */
final class DCalculatorsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://dcalculators.com/en/health/bmi-calculator/',
            'https://dcalculators.com/en/finance/amortization-calculator/',
        ],
        'invalid_urls' => [
            'https://dcalculators.com',
            'https://dcalculators.com/en/health/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('DCalculators', [ 'width' => 480, 'height' => 270]);
    }
}
