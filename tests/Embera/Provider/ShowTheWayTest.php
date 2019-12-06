<?php
/**
 * ShowTheWayTest.php
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
 * Test the ShowTheWay Provider
 */
final class ShowTheWayTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://showtheway.io/to/4.720039,-74.068236?name=Cra.%2058%20%23130-99%20a%20130-1',
            'https://showtheway.io/to/49.279033,9.683933?name=Bahnhofstra%C3%9Fe%2010',
        ],
        'invalid_urls' => [
            'https://showtheway.io/',
            'https://showtheway.io/49.279033,9.683933?name=Bahnhofstra%C3%9Fe%2010',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ShowTheWay', [ 'width' => 480, 'height' => 270]);
    }
}
