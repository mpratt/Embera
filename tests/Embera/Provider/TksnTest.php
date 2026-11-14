<?php
/**
 * TksnTest.php
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
 * Test the Tksn Provider
 */
final class TksnTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tksn.me/oembed-sample/',
        ],
        'invalid_urls' => [
            'https://tksn.me',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Tksn', [ 'width' => 480, 'height' => 270]);
    }
}
