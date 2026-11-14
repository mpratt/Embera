<?php
/**
 * DemoflyTest.php
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
 * Test the Demofly Provider
 */
final class DemoflyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.demofly.ai/s/7wv44vnac2',
        ],
        'invalid_urls' => [
            'https://demofly.ai',
            'https://app.demofly.ai/s',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Demofly', [ 'width' => 480, 'height' => 270]);
    }
}
