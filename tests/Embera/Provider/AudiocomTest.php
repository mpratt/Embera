<?php
/**
 * AudiocomTest.php
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
 * Test the Audiocom Provider
 */
final class AudiocomTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://audio.com/audio-com/audio/luce-mawdsley',
        ],
        'invalid_urls' => [
            'https://audio.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Audiocom', [ 'width' => 480, 'height' => 270]);
    }
}
