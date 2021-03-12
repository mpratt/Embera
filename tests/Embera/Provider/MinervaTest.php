<?php
/**
 * MinervaTest.php
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
 * Test the Minerva Provider
 */
final class MinervaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.minervaknows.com/recipes/1d44cafd-946c-4607-b571-26220fd437ee/follow',
        ],
        'invalid_urls' => [
            'https://app.minervaknows.com/home',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Minerva', [ 'width' => 480, 'height' => 270]);
    }
}
