<?php
/**
 * OdyseeTest.php
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
 * Test the Odysee Provider
 */
final class OdyseeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://odysee.com/@veritasium:f/we-built-an-unrideable-bike-to-show-how:b',
            'https://odysee.com/we-built-an-unrideable-bike-to-show-how:b',
        ],
        'invalid_urls' => [
            'https://odysee.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Odysee', [ 'width' => 480, 'height' => 270]);
    }
}
