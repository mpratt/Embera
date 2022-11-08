<?php
/**
 * TikTokTest.php
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
 * Test the TikTok Provider
 */
final class TikTokTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.tiktok.com/@ingrodolfohernandez/video/7098012357821091078',
            'https://www.tiktok.com/@charlidamelio/video/6837936517164436742',
            'https://www.tiktok.com/@juanpazurita',
        ],
        'invalid_urls' => [
            'https://www.tiktok.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TikTok', [ 'width' => 480, 'height' => 270]);
    }
}
