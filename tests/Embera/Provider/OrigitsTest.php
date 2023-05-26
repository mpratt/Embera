<?php
/**
 * OrigitsTest.php
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
 * Test the Origits Provider
 */
final class OrigitsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://origits.com/v/2ca6a37b-1036579d',
        ],
        'invalid_urls' => [
            'https://origits.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Origits', [ 'width' => 480, 'height' => 270]);
    }
}
