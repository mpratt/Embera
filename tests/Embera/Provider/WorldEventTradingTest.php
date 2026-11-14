<?php
/**
 * WorldEventTradingTest.php
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
 * Test the WorldEventTrading Provider
 */
final class WorldEventTradingTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.worldeventtrading.com/predictions/which-party-will-win-the-senate-in-2026-odds-2026-11-03',
        ],
        'invalid_urls' => [
            'https://www.worldeventtrading.com',
            'https://www.worldeventtrading.com/predictions',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('WorldEventTrading', [ 'width' => 480, 'height' => 270]);
    }
}
