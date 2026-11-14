<?php
/**
 * SketchTest.php
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
 * Test the Sketch Provider
 */
final class SketchTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.sketch.com/s/480ce571-514e-4631-8357-5b7ca4b7773e',
        ],
        'invalid_urls' => [
            'https://www.sketch.com',
            'https://www.sketch.com/s',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Sketch', [ 'width' => 480, 'height' => 270]);
    }
}
