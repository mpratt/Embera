<?php
/**
 * EveryPageTest.php
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
 * Test the EveryPage Provider
 */
final class EveryPageTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://everypage.co/dtbWJZUeUlv5',
        ],
        'invalid_urls' => [
            'https://everypage.co',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('EveryPage', [ 'width' => 480, 'height' => 270]);
    }
}
