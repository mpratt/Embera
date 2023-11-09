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
            'http://geo.hlipp.de/photo/35233',
            'http://germany.geograph.org/photo/36058',
        ],
        'invalid_urls' => [
            'http://geo.hlipp.de',
            'http://geo.hlipp.de/photo/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GeographDE', [ 'width' => 480, 'height' => 270]);
    }
}
