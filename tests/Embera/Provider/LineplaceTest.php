<?php
/**
 * LineplaceTest.php
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
 * Test the Lineplace Provider
 */
final class LineplaceTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://place.line.me/businesses/202385697',
        ],
        'invalid_urls' => [
            'https://place.line.me/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Lineplace', [ 'width' => 480, 'height' => 270]);
    }
}
