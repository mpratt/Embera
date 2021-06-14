<?php
/**
 * PinteresetTest.php
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
 * Test the Pinterest Provider
 */
final class PinterestTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.pinterest.com/pin/99360735500167749/',
            'https://www.pinterest.com/kentbrew/',
            'https://www.pinterest.com/kentbrew/art-i-wish-i-d-made/',
        ],
        'invalid_urls' => [
            'https://www.pinterest.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Pinterest', [ 'width' => 480, 'height' => 270]);
    }
}
