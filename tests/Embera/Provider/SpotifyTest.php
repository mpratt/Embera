<?php
/**
 * SpotifyTest.php
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
 * Test the Spotify Provider
 */
final class SpotifyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.spotify.com/album/4FCuyUjOkT28PnFo6A6vkf/4K4sc36DCTp9YJNVu5zV09',
            'https://play.spotify.com/track/0Wm3w3YiMe7YiS8erpKbOl',
        ],
        'invalid_urls' => [
            'https://play.spotify.com/stuff/3zIzQMHvOlw3ukDhRKR2jO',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spotify', [ 'width' => 480, 'height' => 270]);
    }
}
