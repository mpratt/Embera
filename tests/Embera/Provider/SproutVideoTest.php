<?php
/**
 * SproutVideoTest.php
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
 * Test the SproutVideo Provider
 */
final class SproutVideoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://sproutvideo.com/videos/709adcb31f19e5c6f8',
            'https://sproutvideo-example.vids.io/videos/709adcb31f19e5c6f8/sproutvideo-superheroes',
        ],
        'invalid_urls' => [
            'https://sproutvideo-example.vids.io/709adcb31f19e5c6f8/sproutvideo-superheroes',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SproutVideo', [ 'width' => 480, 'height' => 270]);
    }
}
