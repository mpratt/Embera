<?php
/**
 * SudomemoTest.php
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
 * Test the Sudomemo Provider
 */
final class SudomemoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.sudomemo.net/watch/75D7C9_135509C9F1AA8_000',
            'https://flipnot.es/8UYNV9',
        ],
        'invalid_urls' => [
            'https://www.sudomemo.net',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Sudomemo', [ 'width' => 480, 'height' => 270]);
    }
}
