<?php
/**
 * BiqnetworkTest.php
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
 * Test the Biqnetwork Provider
 */
final class BiqnetworkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://cloud.biqapp.com/387214522072432640/Valorant_03-22-2024_23-3-21-702.mp4',
        ],
        'invalid_urls' => [
            'https://cloud.biqapp.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Biqnetwork', [ 'width' => 480, 'height' => 270]);
    }
}
