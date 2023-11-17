<?php
/**
 * RumbleTest.php
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
 * Test the Rumble Provider
 */
final class RumbleTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://rumble.com/v8ind9-hopping-to-go-outside.html',
            'https://rumble.com/v8intx-he-thinks-hes-grown.html',
            'https://rumble.com/embed/v3tm912/?pub=4',
        ],
        'invalid_urls' => [
            'https://rumble.com/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Rumble', [ 'width' => 480, 'height' => 270]);
    }
}
