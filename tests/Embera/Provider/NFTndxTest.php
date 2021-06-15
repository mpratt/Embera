<?php
/**
 * NFTndxTest.php
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
 * Test the NFTndx Provider
 */
final class NFTndxTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://nftndx.io/token/0x2A46f2fFD99e19a89476E2f62270e0a35bBf0756-40913',
        ],
        'invalid_urls' => [
            'https://nftndx.io/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NFTndx', [ 'width' => 480, 'height' => 270]);
    }
}
