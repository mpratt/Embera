<?php
/**
 * CuratedTest.php
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
 * Test the Curated Provider
 */
final class CuratedTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://optinweekly.curated.co/test',
        ],
        'invalid_urls' => [
            'https://optinweekly.curated.co',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Curated', [ 'width' => 480, 'height' => 270]);
    }
}
