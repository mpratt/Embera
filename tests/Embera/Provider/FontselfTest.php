<?php
/**
 * FontselfTest.php
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
 * Test the Fontself Provider
 */
final class FontselfTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://catapult.fontself.com/gj8eJaq/welcome-regular',
            'https://catapult.fontself.com/MEdLOEq/gilbert-color-bold-preview4',
        ],
        'invalid_urls' => [
            'https://catapult.fontself.com',
            'https://catapult.fontself.com/MEdLOEq/',
            'https://catapult.fontself.com/MEdLOEq/gilbert-color-bold-preview4/other-stuff',
        ],
        'normalize_urls' => [
            'http://catapult.fontself.com/MEdLOEq/?query=string' => 'https://catapult.fontself.com/MEdLOEq',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Fontself', [ 'width' => 480, 'height' => 270]);
    }
}
