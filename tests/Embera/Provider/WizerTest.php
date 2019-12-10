<?php
/**
 * WizerTest.php
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
 * Test the Wizer Provider
 */
final class WizerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.wizer.me/preview/K6EKW',
        ],
        'invalid_urls' => [
            'https://app.wizer.me/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Wizer', [ 'width' => 480, 'height' => 270]);
    }
}
