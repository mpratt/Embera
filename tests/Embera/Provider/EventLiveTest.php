<?php
/**
 * EventLiveTest.php
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
 * Test the EventLive Provider
 */
final class EventLiveTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://evt.live/mail8099/wedding-sample',
        ],
        'invalid_urls' => [
            'https://evt.live',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('EventLive', [ 'width' => 480, 'height' => 270]);
    }
}
