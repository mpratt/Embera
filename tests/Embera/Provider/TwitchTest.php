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
            'https://www.twitch.tv/videos/570000089'
        ],
        'invalid_urls' => [
            'https://www.twitch.tv/',
            'https://www.twitch.tv/videos/',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling testing because provider seems to always return a 204 error code (Twitch). If it continues to fail it will be deleted.');
        }

        $this->validateProvider('Twitch', [ 'width' => 480, 'height' => 270]);
    }
}
