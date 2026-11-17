<?php
/**
 * AtlantisDataSolutionsTest.php
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
 * Test the AtlantisDataSolutions Provider
 */
final class AtlantisDataSolutionsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://atlantisdatasolutions.com/yield-curves',
            'https://atlantisdatasolutions.com/sovereign-yield-curves',
            'https://atlantisdatasolutions.com/screener',
            'https://atlantisdatasolutions.com/bubble-chart-screener',
            'https://atlantisdatasolutions.com/embed/yield-curve',
            'https://atlantisdatasolutions.com/embed/sovereign-curve',
            'https://atlantisdatasolutions.com/embed/screener',
            'https://atlantisdatasolutions.com/embed/europe-screener',
        ],
        'invalid_urls' => [
            'https://atlantisdatasolutions.com',
            'https://atlantisdatasolutions.com/about',
            'https://atlantisdatasolutions.com/embed',
            'https://atlantisdatasolutions.com/yield-curves/other',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('AtlantisDataSolutions', [ 'width' => 480, 'height' => 270]);
    }
}
