<?php
/**
 * GeometryViewerTest.php
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
 * Test the GeometryViewer Provider
 */
final class GeometryViewerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://geometryviewer.com/v/demo.stl',
        ],
        'invalid_urls' => [
            'https://geometryviewer.com',
            'https://geometryviewer.com/v',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GeometryViewer', [ 'width' => 480, 'height' => 270]);
    }
}
