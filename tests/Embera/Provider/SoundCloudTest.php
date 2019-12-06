<?php
/**
 * SoundCloudTest.php
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
 * Test the SoundCloud Provider
 */
final class SoundCloudTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://soundcloud.com/raywilliamjohnson',
            'https://soundcloud.com/raywilliamjohnson/fred-astaire',
            'https://soundcloud.com/flobots/flobots-handle-your-bars-1',
        ],
        'invalid_urls' => [
            'https://soundcloud.com',
            'https://soundcloud.com/discover',
            'https://soundcloud.com/upload',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SoundCloud', [ 'width' => 480, 'height' => 270]);
    }
}
