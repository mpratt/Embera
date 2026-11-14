<?php
/**
 * KommodoTest.php
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
 * Test the Kommodo Provider
 */
final class KommodoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://kommodo.ai/recordings/uzTHxzcd2IjpKkbPbmt2',
            'https://kommodo.ai/guides/7EL2huRx4PBjqLvsG4vF',
        ],
        'invalid_urls' => [
            'https://kommodo.ai',
            'https://kommodo.ai/recordings',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Kommodo', [ 'width' => 480, 'height' => 270]);
    }
}
