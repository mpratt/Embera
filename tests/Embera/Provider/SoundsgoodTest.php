<?php
/**
 * SoundsgoodTest.php
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
 * Test the Soundsgood Provider
 */
final class SoundsgoodTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.soundsgood.co/playlist/if-12-2019',
            'https://play.soundsgood.co/playlist/19-avril-2015',
        ],
        'invalid_urls' => [
            'https://play.soundsgood.co/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Soundsgood', [ 'width' => 480, 'height' => 270]);
    }
}
