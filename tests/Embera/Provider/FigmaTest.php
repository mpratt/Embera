<?php
/**
 * FigmaTest.php
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
 * Test the Figma Provider
 */
final class FigmaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.figma.com/file/2oGA2ADNXOYWnlBI47UN3R/Safe-Return-(Community)',
        ],
        'invalid_urls' => [
            'https://www.figma.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Figma', [ 'width' => 480, 'height' => 270]);
    }
}
