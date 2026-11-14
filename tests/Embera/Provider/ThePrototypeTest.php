<?php
/**
 * ThePrototypeTest.php
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
 * Test the ThePrototype Provider
 */
final class ThePrototypeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://theprototype.app/s/qehnjx9tc9mkvuk',
        ],
        'invalid_urls' => [
            'https://theprototype.app',
            'https://theprototype.app/s',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ThePrototype', [ 'width' => 480, 'height' => 270]);
    }
}
