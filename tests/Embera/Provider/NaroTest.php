<?php
/**
 * NaroTest.php
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
 * Test the Naro Provider
 */
final class NaroTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://naro.fm/3d279130b22484/3d2944a9688b14/',
        ],
        'invalid_urls' => [
            'https://naro.fm/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Naro', [ 'width' => 480, 'height' => 270]);
    }
}
