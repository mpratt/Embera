<?php
/**
 * SpotfulTest.php
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
 * Test the Spotful Provider
 */
final class SpotfulTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.bespotful.com/3457',
        ],
        'invalid_urls' => [
            'https://play.bespotful.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spotful', [ 'width' => 480, 'height' => 270]);
    }
}
