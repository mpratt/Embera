<?php
/**
 * FramerTest.php
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
 * Test the Framer Provider
 */
final class FramerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://framer.com/share/Music-Player--s0uS6VxvZ30W2IabDqOC',
        ],
        'invalid_urls' => [
            'https://framer.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('We require new URLs to test against Framer');
    }
}
