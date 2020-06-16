<?php
/**
 * EmbederyTest.php
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
 * Test the Embedery Provider
 */
final class EmbederyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embedery.com/widget/SzjWkZdPCPYb9iQ0FfwA',
        ],
        'invalid_urls' => [
            'https://embedery.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Embedery', [ 'width' => 480, 'height' => 270]);
    }
}
