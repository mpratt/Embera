<?php
/**
 * AcastTest.php
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
 * Test the Acast Provider
 */
final class AcastTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.acast.com/s/go-off-sis/keepthatsameenergyfeat.kekepalmer',
            'https://shows.acast.com/the-4000-holes-podcast-1/episodes/the-round-table-show-the-2024-christmas-special'
        ],
        'invalid_urls' => [
            'https://play.acast.com/go-off-sis/keepthatsameenergyfeat.kekepalmer',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Acast', [ 'width' => 480, 'height' => 270]);
    }
}
