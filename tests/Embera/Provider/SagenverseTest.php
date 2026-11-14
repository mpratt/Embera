<?php
/**
 * SagenverseTest.php
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
 * Test the Sagenverse Provider
 */
final class SagenverseTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app2.sagenverse.com/embed/3f6ddc5a-c8aa-47b4-86e4-05bbdb20b56c',
        ],
        'invalid_urls' => [
            'https://sagenverse.com',
            'https://app2.sagenverse.com/embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Sagenverse', [ 'width' => 480, 'height' => 270]);
    }
}
