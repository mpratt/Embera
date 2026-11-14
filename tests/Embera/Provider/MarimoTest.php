<?php
/**
 * MarimoTest.php
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
 * Test the Marimo Provider
 */
final class MarimoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://marimo.app/l/d4og6r',
            'https://marimo.app/l/d4og6r?mode=read',
        ],
        'invalid_urls' => [
            'https://marimo.app',
            'https://marimo.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Marimo', [ 'width' => 480, 'height' => 270]);
    }
}
