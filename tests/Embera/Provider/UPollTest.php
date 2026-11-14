<?php
/**
 * UPollTest.php
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
 * Test the UPoll Provider
 */
final class UPollTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://u-poll.com/p/nvidia-enters-windows-laptop-market-taking-on-intel-and-amd-who-will-lead-7uunsx',
        ],
        'invalid_urls' => [
            'https://u-poll.com',
            'https://u-poll.com/p',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('UPoll', [ 'width' => 480, 'height' => 270]);
    }
}
