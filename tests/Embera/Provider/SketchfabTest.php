<?php
/**
 * SketchfabTest.php
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
 * Test the Sketchfab Provider
 */
final class SketchfabTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://sketchfab.com/3d-models/loring-tweet-power-line-9a48434e545f44d08801c8ce2a72e41b',
            'https://sketchfab.com/3d-models/man-in-the-metro-15365e67e2d44e6f8da6a5574d1841df',
            'https://sketchfab.com/3d-models/hamilton-beach-home-motor-247275b3335a4d7b8eb327858ea67149',
        ],
        'invalid_urls' => [
            'https://sketchfab.com/3d-models/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Sketchfab', [ 'width' => 480, 'height' => 270]);
    }
}
