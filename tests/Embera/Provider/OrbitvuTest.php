<?php
/**
 * OrbitvuTest.php
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
 * Test the Orbitvu Provider
 */
final class OrbitvuTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://orbitvu.co/001/JJXNutMRq8DvjEQ8Sbv8WH/ov3601/3/view',
            'https://orbitvu.co/001/JJXNutMRq8DvjEQ8Sbv8WH/2/orbittour/61/view'
        ],
        'invalid_urls' => [
            'https://orbitvu.co',
            'https://orbitvu.co/stuff/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Orbitvu', [ 'width' => 480, 'height' => 270]);
    }
}
