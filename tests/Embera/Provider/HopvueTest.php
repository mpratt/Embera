<?php
/**
 * HopvueTest.php
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
 * Test the Hopvue Provider
 */
final class HopvueTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.hopvue.com/videos/robots/44c66c71-7735-4e34-c25f-08d8eff1659e',
        ],
        'invalid_urls' => [
            'https://www.hopvue.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Hopvue', [ 'width' => 480, 'height' => 270]);
    }
}
