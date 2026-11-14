<?php
/**
 * BudgetPixelTest.php
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
 * Test the BudgetPixel Provider
 */
final class BudgetPixelTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://budgetpixel.com/p/80503',
            'https://budgetpixel.com/sfx/pressure-cooker-whistle-build-a0f32544',
        ],
        'invalid_urls' => [
            'https://budgetpixel.com',
            'https://budgetpixel.com/sfx',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('BudgetPixel', [ 'width' => 480, 'height' => 270]);
    }
}
