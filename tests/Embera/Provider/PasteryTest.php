<?php
/**
 * PasteryTest.php
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
 * Test the Pastery Provider
 */
final class PasteryTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            /* We cannot test real urls because they expire */
            'https://www.pastery.net/api/',
            'https://www.pastery.net/about/?query=string',
            'https://www.pastery.net/plugins/',
        ],
        'invalid_urls' => [
            'https://www.pastery.net/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Pastery', [ 'width' => 480, 'height' => 270]);
    }
}
