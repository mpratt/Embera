<?php
/**
 * WaveVideoTest.php
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
 * Test the WaveVideo Provider
 */
final class WaveVideoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://watch.wave.video/382c2d5bbb3949858a0c3f2f',
        ],
        'invalid_urls' => [
            'https://wave.video/',
            'https://wave.video/382c2d5bbb3949858a0c3f2f',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('WaveVideo', [ 'width' => 480, 'height' => 270]);
    }
}
