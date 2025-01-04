<?php
/**
 * VizdomTest.php
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
 * Test the Vizdom Provider
 */
final class VizdomTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vizdom.dev/link/c8bb315c-55e8-433a-905d-e438318d90ca',
        ],
        'invalid_urls' => [
            'https://vizdom.dev',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Vizdom', [ 'width' => 480, 'height' => 270]);
    }
}
