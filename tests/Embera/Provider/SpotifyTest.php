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
            'https://open.spotify.com/album/4FCuyUjOkT28PnFo6A6vkf/4K4sc36DCTp9YJNVu5zV09',
            'https://open.spotify.com/track/0Wm3w3YiMe7YiS8erpKbOl',
            'https://open.spotify.com/show/3wBfqov60qDZbEVjPHo0a8?si=2ee16a763fd44148',
            'https://open.spotify.com/intl-de/artist/5eAWCfyUhZtHHtBdNk56l1?si=i0-JP01CRz-X4n_pQOZpKA',
            'https://open.spotify.com/artist/5eAWCfyUhZtHHtBdNk56l1?si=i0-JP01CRz-X4n_pQOZpKA'
        ],
        'invalid_urls' => [
            'https://open.spotify.com/stuff/3zIzQMHvOlw3ukDhRKR2jO',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spotify', [ 'width' => 480, 'height' => 270]);
    }
}
