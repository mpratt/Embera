<?php
/**
 * MixCloudTest.php
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
 * Test the MixCloud Provider
 */
final class MixCloudTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.mixcloud.com/naj/naj-podcast-live-december-2019/',
            'https://www.mixcloud.com/melodicdistraction/spaced-out-with-chris-barker-november-19/',
            'https://www.mixcloud.com/Kahvi/430-avtvmna-summer-estate',
        ],
        'invalid_urls' => [
            'https://www.mixcloud.com/',
            'https://www.mixcloud.com/discover/beats/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MixCloud', [ 'width' => 480, 'height' => 270]);
    }
}
