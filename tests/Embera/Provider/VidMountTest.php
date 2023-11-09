<?php
/**
 * VidMountTest.php
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
 * Test the VidMount Provider
 */
final class VidMountTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vidmount.com/watch/16186fb990298f',
        ],
        'invalid_urls' => [
            'https://vidmount.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('VidMount', [ 'width' => 480, 'height' => 270]);
    }
}
