<?php
/**
 * PiggyTest.php
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
 * Test the Piggy Provider
 */
final class PiggyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://piggy.to/@magic/ldm92f',
        ],
        'invalid_urls' => [
            'https://piggy.to',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Piggy', [ 'width' => 480, 'height' => 270]);
    }
}
