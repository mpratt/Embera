<?php
/**
 * OverflowIOTest.php
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
 * Test the OverflowIO Provider
 */
final class OverflowIOTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://overflow.io/s/W2U581Q9?node=ea0b2b6b'
        ],
        'invalid_urls' => [
            'https://overflow.io/',
            'https://overflow.io/s/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('OverflowIO', [ 'width' => 480, 'height' => 270]);
    }
}
