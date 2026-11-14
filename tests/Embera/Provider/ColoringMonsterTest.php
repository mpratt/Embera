<?php
/**
 * ColoringMonsterTest.php
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
 * Test the ColoringMonster Provider
 */
final class ColoringMonsterTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://coloringmonster.com/coloring-page/a-dragon-in-a-meadow-5dfc159b',
        ],
        'invalid_urls' => [
            'https://coloringmonster.com',
            'https://coloringmonster.com/coloring-page',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ColoringMonster', [ 'width' => 480, 'height' => 270]);
    }
}
