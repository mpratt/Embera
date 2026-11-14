<?php
/**
 * CarbonTest.php
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
 * Test the Carbon Provider
 */
final class CarbonTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://carbon.music/track/db76bcc5-56e8-407c-bedd-7b74d4e7b066',
        ],
        'invalid_urls' => [
            'https://carbon.music',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Carbon', [ 'width' => 480, 'height' => 270]);
    }
}
