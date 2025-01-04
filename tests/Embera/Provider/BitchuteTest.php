<?php
/**
 * BitchuteTest.php
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
 * Test the Bitchute Provider
 */
final class BitchuteTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://api.bitchute.com/video/cWaTfjoVyyao/',
        ],
        'invalid_urls' => [
            'https://bitchute.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Bitchute', [ 'width' => 480, 'height' => 270]);
    }
}
