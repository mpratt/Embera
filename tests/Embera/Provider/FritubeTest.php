<?php
/**
 * FritubeTest.php
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
 * Test the Fritube Provider
 */
final class FritubeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fritube.ch/v/18dt2g',
        ],
        'invalid_urls' => [
            'https://fritube.ch',
            'https://fritube.ch/v',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Fritube', [ 'width' => 480, 'height' => 270]);
    }
}
