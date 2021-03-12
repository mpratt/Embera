<?php
/**
 * GongTest.php
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
 * Test the Gong Provider
 */
final class GongTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.gong.io:8080/call?id=1111111111111111111',
        ],
        'invalid_urls' => [
            'https://app.gong.io:8080/home?id=1111111111111111111',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Gong', [ 'width' => 480, 'height' => 270]);
    }
}
