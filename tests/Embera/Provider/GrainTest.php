<?php
/**
 * GrainTest.php
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
 * Test the Grain Provider
 */
final class GrainTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://grain.co/share/highlight/tZUKIxcZAPaqa0Gzkgw1glKRfBPjcVo5',
        ],
        'invalid_urls' => [
            'https://grain.co/',
            'https://grain.co/highlight/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Grain', [ 'width' => 480, 'height' => 270]);
    }
}
