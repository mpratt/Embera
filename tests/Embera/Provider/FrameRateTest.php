<?php
/**
 * FrameRateTest.php
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
 * Test the FrameRate Provider
 */
final class FrameRateTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://framerate.tv/watch/52e6a94a-6985-4611-ab4a-b1e7e047ef22',
        ],
        'invalid_urls' => [
            'https://framerate.tv',
            'https://framerate.tv/watch',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('FrameRate', [ 'width' => 480, 'height' => 270]);
    }
}
