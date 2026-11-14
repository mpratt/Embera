<?php
/**
 * AudioSFXTest.php
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
 * Test the AudioSFX Provider
 */
final class AudioSFXTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://audiosfx.org/audio/1553920940042354809',
        ],
        'invalid_urls' => [
            'https://audiosfx.org',
            'https://audiosfx.org/audio',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('AudioSFX', [ 'width' => 480, 'height' => 270]);
    }
}
