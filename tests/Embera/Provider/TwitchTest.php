<?php
/**
 * TwitchTest.php
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
 * Test the Twitch Provider
 */
final class TwitchTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.twitch.tv/videos/518050359',
            'https://www.twitch.tv/videos/517959979',
        ],
        'invalid_urls' => [
            'https://www.twitch.tv/',
            'https://www.twitch.tv/videos/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Twitch', [ 'width' => 480, 'height' => 270]);
    }
}
