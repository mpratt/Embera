<?php
/**
 * GigNGoTest.php
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
 * Test the GigNGo Provider
 */
final class GigNGoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://gigngo.org/watch/aa93ff17fd3e5c2268fedb5a0170f113',
        ],
        'invalid_urls' => [
            'https://gigngo.org',
            'https://gigngo.org/watch',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GigNGo', [ 'width' => 480, 'height' => 270]);
    }
}
