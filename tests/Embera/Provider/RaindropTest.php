<?php
/**
 * RaindropTest.php
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
 * Test the Raindrop Provider
 */
final class RaindropTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://raindrop.io/exentrich/design-66',
        ],
        'invalid_urls' => [
            'https://raindrop.io/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Raindrop', [ 'width' => 480, 'height' => 270]);
    }
}
