<?php
/**
 * WecandeoTest.php
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
 * Test the Wecandeo Provider
 */
final class WecandeoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.wecandeo.com/video/v/?key=BOKNS9AQWrHDOWXC7DUr6tHd023xknvmIii8SOulPCMtAT1KxqmfHySho4pqLKNis4ZCy4IG7kZTQ431147TteoAieie',
        ],
        'invalid_urls' => [
            'https://play.wecandeo.com/video/v/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Wecandeo', [ 'width' => 480, 'height' => 270]);
    }
}
