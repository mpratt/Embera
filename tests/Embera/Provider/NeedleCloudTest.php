<?php
/**
 * NeedleCloudTest.php
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
 * Test the NeedleCloud Provider
 */
final class NeedleCloudTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://cloud.needle.tools/view?file=Z23hmXBZ1Y5yHp-Z1Y5yHp-world',
            'https://cloud.needle.tools/view?file=Z23hmXBZ13e102-Z13e102-product',
        ],
        'invalid_urls' => [
            'https://cloud.needle.tools',
            'https://cloud.needle.tools/view',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NeedleCloud', [ 'width' => 480, 'height' => 270]);
    }
}
