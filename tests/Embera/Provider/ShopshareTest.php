<?php
/**
 * ShopshareTest.php
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
 * Test the Shopshare Provider
 */
final class ShopshareTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://shopshare.tv/shopcast/U2hvcGNhc3Q6NzExNA==',
            'https://shopshare.tv/shopboard/TG9va2Jvb2s6ODQwOQ==',
        ],
        'invalid_urls' => [
            'https://shopshare.tv',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Shopshare', [ 'width' => 480, 'height' => 270]);
    }
}
