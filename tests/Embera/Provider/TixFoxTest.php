<?php
/**
 * TixFoxTest.php
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
 * Test the TixFox Provider
 */
final class TixFoxTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tixfox.co/e/HwDlQ5LA0A',
            'https://tixfox.co/o/example-inc-dont-edit',
        ],
        'invalid_urls' => [
            'https://tixfox.co',
            'https://tixfox.co/e',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TixFox', [ 'width' => 480, 'height' => 270]);
    }
}
