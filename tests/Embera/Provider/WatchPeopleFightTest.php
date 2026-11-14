<?php
/**
 * WatchPeopleFightTest.php
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
 * Test the WatchPeopleFight Provider
 */
final class WatchPeopleFightTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://watchpeoplefight.com/watch/wsh-234028',
        ],
        'invalid_urls' => [
            'https://watchpeoplefight.com',
            'https://watchpeoplefight.com/watch',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('WatchPeopleFight', [ 'width' => 480, 'height' => 270]);
    }
}
