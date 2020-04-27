<?php
/**
 * WokwiTest.php
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
 * Test the Wokwi Provider
 */
final class WokwiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://wokwi.com/share/iq7UORC5aVcFKNdwy9sF',
        ],
        'invalid_urls' => [
            'https://wokwi.com/',
            'https://wokwi.com/share/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Wokwi', [ 'width' => 480, 'height' => 270]);
    }
}
