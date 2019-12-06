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
            'https://sketchfab.com/3d-models/man-in-the-metro-15365e67e2d44e6f8da6a5574d1841df',
            'https://sketchfab.com/3d-models/hamilton-beach-home-motor-247275b3335a4d7b8eb327858ea67149',
            'https://sketchfab.com/3d-models/railway-oil-tank-vr1-a7a4516517b946a6bb1da7e72d836d45?ref=store_landing',
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
