<?php
/**
 * KurozoraTest.php
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
 * Test the Kurozora Provider
 */
final class KurozoraTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://kurozora.app/songs/4',
        ],
        'invalid_urls' => [
            'https://kurozora.app',
        ],
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('Kurozora uses cloudflare and it blocks the tests');
    }
}
