<?php
/**
 * VouchForTest.php
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
 * Test the VouchFor Provider
 */
final class VouchForTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.vouchfor.com/pBjPDICb83',
        ],
        'invalid_urls' => [
            'https://app.vouchfor.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('VouchFor', [ 'width' => 480, 'height' => 270]);
    }
}
