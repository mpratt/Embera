<?php
/**
 * SpotlightrTest.php
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
 * Test the Spotlightr Provider
 */
final class SpotlightrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://0.cdn.spotlightr.com/watch/MTI4NTg5MA==',
        ],
        'invalid_urls' => [
            'https://0.cdn.spotlightr.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spotlightr', [ 'width' => 480, 'height' => 270]);
    }
}
