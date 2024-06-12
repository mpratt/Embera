<?php
/**
 * BunnyTest.php
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
 * Test the Bunny Provider
 */
final class BunnyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://iframe.mediadelivery.net/embed/51808/68d791f4-510a-4928-9f5a-4526e82d1336',
        ],
        'invalid_urls' => [
            'https://bunny.net',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Bunny', [ 'width' => 480, 'height' => 270]);
    }
}
