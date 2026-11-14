<?php
/**
 * CastmakeTest.php
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
 * Test the Castmake Provider
 */
final class CastmakeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.castmake-ai.com/c/YnEibJ16Y4D4Be5vdmZ5/episodes/N3R5cypdRi6kwRTD86jy',
        ],
        'invalid_urls' => [
            'https://www.castmake-ai.com',
            'https://www.castmake-ai.com/c/YnEibJ16Y4D4Be5vdmZ5',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Castmake', [ 'width' => 480, 'height' => 270]);
    }
}
