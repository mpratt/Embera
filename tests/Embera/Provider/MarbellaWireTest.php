<?php
/**
 * MarbellaWireTest.php
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
 * Test the MarbellaWire Provider
 */
final class MarbellaWireTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://marbellawire.com/news/biodegradable-sea-burials-offered-in-fuengirola-and/',
        ],
        'invalid_urls' => [
            'https://marbellawire.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MarbellaWire', [ 'width' => 480, 'height' => 270]);
    }
}
