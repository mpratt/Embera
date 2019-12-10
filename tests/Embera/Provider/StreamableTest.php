<?php
/**
 * StreamableTest.php
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
 * Test the Streamable Provider
 */
final class StreamableTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://streamable.com/si8d',
            'http://streamable.com/a7wj/',
            'http://streamable.com/dgn9?query=string',
            'http://streamable.com/ifjh',
        ],
        'invalid_urls' => [
            'http://streamable.com/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Streamable', [ 'width' => 480, 'height' => 270]);
    }
}
