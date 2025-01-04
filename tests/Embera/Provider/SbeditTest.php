<?php
/**
 * SbeditTest.php
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
 * Test the Sbedit Provider
 */
final class SbeditTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://sbedit.net/embed/073a35f83fc4f16e597f56208573d29b3dbd55ce',
            'https://sbedit.net/oembed/073a35f83fc4f16e597f56208573d29b3dbd55ce',
        ],
        'invalid_urls' => [
            'https://sbedit.net',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Sbedit', [ 'width' => 480, 'height' => 270]);
    }
}
