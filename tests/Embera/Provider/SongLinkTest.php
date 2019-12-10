<?php
/**
 * SongLinkTest.php
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
 * Test the SongLink Provider
 */
final class SongLinkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://song.link/co/i/632302900',
            'https://song.link/i/477022873',
            'https://song.link/co/i/1440833804',
        ],
        'invalid_urls' => [
            'https://song.link/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('SongLink', [ 'width' => 480, 'height' => 270]);
    }
}
