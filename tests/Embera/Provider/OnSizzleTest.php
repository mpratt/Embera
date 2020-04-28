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
            'https://me.me/i/ten-kingiames-last-night-lebron-james-finally-got-that-ring-3174471',
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
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (OnSizzle).');
        }

        $this->validateProvider('OnSizzle', [ 'width' => 480, 'height' => 270]);
    }
}
