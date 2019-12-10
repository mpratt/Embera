<?php
/**
 * OutplayedTest.php
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
 * Test the Outplayed Provider
 */
final class OutplayedTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://outplayed.tv/media/qmjXn/',
            'https://outplayed.tv/media/xgwQw/lol-xerath-assist',
        ],
        'invalid_urls' => [
            'https://outplayed.tv/',
            'https://outplayed.tv/media/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Outplayed', [ 'width' => 480, 'height' => 270]);
    }
}
