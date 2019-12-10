<?php
/**
 * ReverbNationTest.php
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
 * Test the ReverbNation Provider
 */
final class ReverbNationTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.reverbnation.com/embera',
            'https://www.reverbnation.com/embera/song/252782-rb-riddim?source=artistProfile',
            'https://www.reverbnation.com/consuladopopular/song/29561132-que-rico?source=artistProfile',
        ],
        'invalid_urls' => [
            'https://www.reverbnation.com/',
            'https://www.reverbnation.com/main/search?q=embera',
            'https://www.reverbnation.com/main/discover',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ReverbNation', [ 'width' => 480, 'height' => 270]);
    }
}
