<?php
/**
 * RoosterTeethTest.php
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
 * Test the RoosterTeeth Provider
 */
final class RoosterTeethTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://roosterteeth.com/watch/dc-daily-december-05-2019',
            'https://roosterteeth.com/watch/dc-daily-december-04-2019',
            'https://roosterteeth.com/watch/fullhaus-2019-fullgtaclubkings',
        ],
        'invalid_urls' => [
            'https://roosterteeth.com/',
            'https://roosterteeth.com/watch/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('RoosterTeeth', [ 'width' => 480, 'height' => 270]);
    }
}
