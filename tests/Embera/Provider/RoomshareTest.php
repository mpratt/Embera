<?php
/**
 * RoomshareTest.php
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
 * Test the Roomshare Provider
 */
final class RoomshareTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://roomshare.jp/en/post/213284',
            'http://roomshare.jp/post/213226',
        ],
        'invalid_urls' => [
            'http://roomshare.jp/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Roomshare', [ 'width' => 480, 'height' => 270]);
    }
}
