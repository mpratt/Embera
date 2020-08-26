<?php
/**
 * PortfoliumTest.php
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
 * Test the Portfolium Provider
 */
final class PortfoliumTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://portfolium.com/entry/collision-conference-2016',
        ],
        'invalid_urls' => [
            'https://portfolium.com/',
            'https://portfolium.com/entry/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Portfolium', [ 'width' => 480, 'height' => 270]);
    }
}
