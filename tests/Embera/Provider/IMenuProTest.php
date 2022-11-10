<?php
/**
 * IMenuProTest.php
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
 * Test the IMenuPro Provider
 */
final class IMenuProTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://qr.imenupro.com/4m-h9',
        ],
        'invalid_urls' => [
            'https://qr.imenupro.com',
        ],
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('IMenuPro: Oembed endpoint seems to be down. Shutting down if continues. (2022-11-09)');
        //$this->validateProvider('IMenuPro', [ 'width' => 480, 'height' => 270]);
    }
}
