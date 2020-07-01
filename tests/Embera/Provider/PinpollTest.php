<?php
/**
 * PinpollTest.php
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
 * Test the Pinpoll Provider
 */
final class PinpollTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tools.pinpoll.com/embed/1',
        ],
        'invalid_urls' => [
            'https://tools.pinpoll.com/collection/2/other/path',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Pinpoll', [ 'width' => 480, 'height' => 270]);
    }
}
