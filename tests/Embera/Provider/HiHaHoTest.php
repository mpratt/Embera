<?php
/**
 * HiHaHoTest.php
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
 * Test the HiHaHo Provider
 */
final class HiHaHoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://player.hihaho.com/7B37C4FE-AA48-4397-AFFD-C2629260ACD9',
        ],
        'invalid_urls' => [
            'https://player.hihaho.com',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (HiHaHo).');
        }

        $this->validateProvider('HiHaHo', [ 'width' => 480, 'height' => 270]);
    }
}
