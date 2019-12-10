<?php
/**
 * ShoudioTest.php
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
 * Test the Shoudio Provider
 */
final class ShoudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://shoudio.com/user/natuurmonumenten/status/26047',
            'https://shoudio.com/user/ivn289/status/24242',
        ],
        'invalid_urls' => [
            'https://shoudio.com/',
        ],
        'normalize_urls' => [
            'https://shoudio.com/user/ivn289/status/24242' => 'http://shoudio.com/user/ivn289/status/24242',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Shoudio', [ 'width' => 480, 'height' => 270]);
    }
}
