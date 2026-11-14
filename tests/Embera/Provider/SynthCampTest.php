<?php
/**
 * SynthCampTest.php
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
 * Test the SynthCamp Provider
 */
final class SynthCampTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://synthcamp.net/r/axi-warrior-realm-1',
        ],
        'invalid_urls' => [
            'https://synthcamp.net',
            'https://synthcamp.net/r',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SynthCamp', [ 'width' => 480, 'height' => 270]);
    }
}
