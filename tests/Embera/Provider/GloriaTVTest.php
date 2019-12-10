<?php
/**
 * GloriaTVTest.php
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
 * Test the GloriaTV Provider
 */
final class GloriaTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.gloria.tv/post/nLYByXzwST3E26Wx1k7ZCwwP8?query=string',
            'https://gloria.tv/post/62FT1LmLY8aLDeXYJnrUHbgJY',
        ],
        'invalid_urls' => [
            'https://gloria.tv/',
            'https://gloria.tv/post/62FT1LmLY8aLDeXYJnrUHbgJY/embed',
        ],
        'normalize_urls' => [
            'http://gloria.tv/post/62FT1LmLY8aLDeXYJnrUHbgJY?query=string' => 'https://gloria.tv/post/62FT1LmLY8aLDeXYJnrUHbgJY',
        ],
        'fake_response' => [
            'type' => 'rich|video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('GloriaTV', [ 'width' => 480, 'height' => 270]);
    }
}
