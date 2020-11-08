<?php
/**
 * WolframCloudTest.php
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
 * Test the WolframCloud Provider
 */
final class WolframCloudTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.wolframcloud.com/obj/b9e9ecd9-b523-4da8-a7da-948ecfc228a9',
        ],
        'invalid_urls' => [
            'https://www.wolframcloud.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('WolframCloud', [ 'width' => 480, 'height' => 270]);
    }
}
