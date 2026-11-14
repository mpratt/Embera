<?php
/**
 * HDRShowTest.php
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
 * Test the HDRShow Provider
 */
final class HDRShowTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://hdr.show/view/demo',
            'https://hdr.show/view/demo-2',
        ],
        'invalid_urls' => [
            'https://hdr.show',
            'https://hdr.show/view',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('HDRShow', [ 'width' => 480, 'height' => 270]);
    }
}
