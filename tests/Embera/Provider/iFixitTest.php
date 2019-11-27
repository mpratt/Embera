<?php
/**
 * iFixitTest.php
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
 * Test the iFixit Provider
 */
final class iFixitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.ifixit.com/Guide/iPhone+X+Screen+Replacement/102423',
            'http://www.ifixit.com/Teardown/iPhone+11+Pro+Max+Teardown/126000',
            'https://ifixit.com/Guide/iPhone+7+Screen+Replacement/67489',
        ],
        'invalid_urls' => [
            'https://ifixit.com',
            'https://ifixit.com/Guide/iPhone+7+Screen+Replacement/67489/other/section',
        ],
        'normalize_urls' => [
            'http://ifixit.com/Guide/iPhone+7+Screen+Replacement/67489?query=string' => 'https://ifixit.com/Guide/iPhone+7+Screen+Replacement/67489',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('iFixit', [ 'width' => 480, 'height' => 270]);
    }
}
