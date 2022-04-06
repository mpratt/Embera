<?php
/**
 * GmetriTest.php
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
 * Test the Gmetri Provider
 */
final class GmetriTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://game.gmetri.com/safehands_v2',
        ],
        'invalid_urls' => [
            'https://view.gmetri.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Gmetri', [ 'width' => 480, 'height' => 270]);
    }
}
