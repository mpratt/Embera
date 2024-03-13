<?php
/**
 * Web3IsGoingJustGreatTest.php
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
 * Test the Web3IsGoingJustGreat Provider
 */
final class Web3IsGoingJustGreatTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.web3isgoinggreat.com/single/2023-11-21-1',
            'https://www.web3isgoinggreat.com/single/binance-legal-action',
            'https://www.web3isgoinggreat.com/?id=binance-legal-action',
        ],
        'invalid_urls' => [
            'https://www.web3isgoinggreat.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Web3IsGoingJustGreat', [ 'width' => 480, 'height' => 270]);
    }
}
