<?php
/**
 * MusicboxManiacsTest.php
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
 * Test the MusicboxManiacs Provider
 */
final class MusicboxManiacsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://musicboxmaniacs.com/explore/melody/i-confess-the-english-beat_50643/',
            'https://musicboxmaniacs.com/explore/melody/gypsy-bard_50635',
            'https://musicboxmaniacs.com/explore/melody/fox-on-the-run-sweet_50640/?query=string',
        ],
        'invalid_urls' => [
            'https://musicboxmaniacs.com/',
            'https://musicboxmaniacs.com/explore/melody/fox-on-the-run-sweet_50640/other-stuff',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('MusicboxManiacs', [ 'width' => 480, 'height' => 270]);
    }
}
