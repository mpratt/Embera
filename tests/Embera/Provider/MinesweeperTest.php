<?php
/**
 * MinesweeperTest.php
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
 * Test the Minesweeper Provider
 */
final class MinesweeperTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://minesweeper.today/easy',
        ],
        'invalid_urls' => [
            'https://minesweeper.today',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Minesweeper', [ 'width' => 480, 'height' => 270]);
    }
}
