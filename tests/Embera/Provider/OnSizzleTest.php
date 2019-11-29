<?php
/**
 * OnsizzleTest.php
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
 * Test the Onsizzle Provider
 */
final class OnSizzleTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://onsizzle.com/i/raising-my-son-to-be-a-man-that-your-daughter-f9547802d7664f03a9e3c15d76991947',
            'https://me.me/i/ten-kingiames-last-night-lebron-james-finally-got-that-ring-3174471',
            'https://me.me/i/walking-past-a-stranger-my-brain-dont-do-it-dont-c92e181e86f6461c9bc7dfc7dd5fde29',
        ],
        'invalid_urls' => [
            'https://me.me/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Onsizzle', [ 'width' => 480, 'height' => 270]);
    }
}
