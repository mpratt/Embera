<?php
/**
 * QTpiTest.php
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
 * Test the QTpi Provider
 */
final class QTpiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://qtpi.gg/fashion/2b',
            'https://qtpi.gg/fashion/test saul',
        ],
        'invalid_urls' => [
            'https://qtpi.gg/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('QTpi', [ 'width' => 480, 'height' => 270]);
    }
}
