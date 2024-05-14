<?php
/**
 * CeleroTest.php
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
 * Test the Celero Provider
 */
final class CeleroTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embeds.celero.io/s/7b9ee071',
        ],
        'invalid_urls' => [
            'https://embeds.celero.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Celero', [ 'width' => 480, 'height' => 270]);
    }
}
