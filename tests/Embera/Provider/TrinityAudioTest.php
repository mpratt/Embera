<?php
/**
 * TrinityAudioTest.php
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
 * Test the TrinityAudio Provider
 */
final class TrinityAudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://trinityaudio.ai/player/oembed?unitId=1&url=https%3A%2F%2Fexample.com',
        ],
        'invalid_urls' => [
            'https://trinityaudio.ai/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('We need public urls to test TrinityAudio');
        //$this->validateProvider('TrinityAudio', [ 'width' => 480, 'height' => 270]);
    }
}
