<?php
/**
 * GeographDETest.php
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
 * Test the GeographDE Provider
 */
final class GeographDETest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://geo-en.hlipp.de/photo/36058',
            'http://geo-en.hlipp.de/photo/22092/',
            'http://geo.hlipp.de/photo/35233',
            'http://geo.hlipp.de/photo/30213',
            'http://germany.geograph.org/photo/40426',
            'http://germany.geograph.org/photo/36058',
        ],
        'invalid_urls' => [
            'http://geo.hlipp.de',
            'http://geo.hlipp.de/photo/',
        ],
        'normalize_urls' => [
            'http://geo.hlipp.de/photo/30213' => 'https://geo.hlipp.de/photo/30213',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GeographDE', [ 'width' => 480, 'height' => 270]);
    }
}
