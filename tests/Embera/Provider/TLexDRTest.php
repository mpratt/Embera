<?php
/**
 * TLexDRTest.php
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
 * Test the TLexDR Provider
 */
final class TLexDRTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tlexdr.com/episode/498',
        ],
        'invalid_urls' => [
            'https://tlexdr.com',
            'https://tlexdr.com/episode',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TLexDR', [ 'width' => 480, 'height' => 270]);
    }
}
