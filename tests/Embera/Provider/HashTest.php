<?php
/**
 * HashTest.php
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
 * Test the Hash Provider
 */
final class HashTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://core.hash.ai/@hash/wildfires-regrowth/stable',
            'https://core.hash.ai/@hash/warehouse-logistics/stable',
            'https://core.hash.ai/@hash/traffic-intersection/stable',
        ],
        'invalid_urls' => [
            'https://core.hash.ai/',
            'https://core.hash.ai/@hash/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Hash', [ 'width' => 480, 'height' => 270]);
    }
}
