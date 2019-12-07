<?php
/**
 * VeerTest.php
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
 * Test the Veer Provider
 */
final class VeerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://veer.tv/videos/tiny-tank-343726',
            'https://veer.tv/videos/dreams-dali-143051',
            'https://veervr.tv/videos/life-inside-coffin-home-142621',
        ],
        'invalid_urls' => [
            'https://veervr.tv',
        ],
        'normalize_urls' => [
            'https://veervr.tv/videos/life-inside-coffin-home-142621' => 'https://veer.tv/videos/life-inside-coffin-home-142621',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Veer', [ 'width' => 480, 'height' => 270]);
    }
}
