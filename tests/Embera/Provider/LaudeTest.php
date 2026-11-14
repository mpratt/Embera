<?php
/**
 * LaudeTest.php
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
 * Test the Laude Provider
 */
final class LaudeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://laude.org/impact/andy-konwinski',
            'https://laude.org/im/andy-konwinski',
            'https://www.laude.org/impact/david-patterson',
        ],
        'invalid_urls' => [
            'https://laude.org',
            'https://laude.org/impact',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Laude', [ 'width' => 480, 'height' => 270]);
    }
}
