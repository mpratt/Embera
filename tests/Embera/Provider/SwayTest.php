<?php
/**
 * SwayTest.php
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
 * Test the Sway Provider
 */
final class SwayTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://sway.office.com/howtosway',
            'https://sway.com/universe_cheatsheet',
            'https://sway.office.com/mint_tulip',
        ],
        'invalid_urls' => [
            'https://sway.office.com/',
            'https://sway.com/',
        ],
        'normalize_urls' => [
            'https://sway.office.com/mint_tulip' => 'https://sway.com/mint_tulip',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Sway', [ 'width' => 480, 'height' => 270]);
    }
}
