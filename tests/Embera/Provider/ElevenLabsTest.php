<?php
/**
 * ElevenLabsTest.php
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
 * Test the ElevenLabs Provider
 */
final class ElevenLabsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://elevenlabs.io/music/songs/icz6HAmzkcw2dHMdzaAC',
            'https://elevenlabs.io/music/songs/FGuqsn7mM2ZeFec4uBpp',
        ],
        'invalid_urls' => [
            'https://elevenlabs.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ElevenLabs', [ 'width' => 480, 'height' => 270]);
    }
}
