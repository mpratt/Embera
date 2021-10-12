<?php
/**
 * ChrocoTest.php
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
 * Test the Chroco Provider
 */
final class ChrocoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://chroco.ooo/story/ee261faa-2127-4a30-bd12-8656bb0786f0',
        ],
        'invalid_urls' => [
            'https://chroco.ooo',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Chroco', [ 'width' => 480, 'height' => 270]);
    }
}
