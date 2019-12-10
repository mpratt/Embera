<?php
/**
 * TypecastTest.php
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
 * Test the Typecast Provider
 */
final class TypecastTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.typecast.ai/s/5cea4dba0a4b290007784169',
            'https://play.typecast.ai/s/5cdd8da6f3a83a0007b80b17',
            'https://play.typecast.ai/s/5ce8e8c90a4b290007784053?source=post_page-----cbcc697253ab----------------------',
        ],
        'invalid_urls' => [
            'https://typecast.ai/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Typecast', [ 'width' => 480, 'height' => 270]);
    }
}
