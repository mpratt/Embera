<?php
/**
 * SapoVideosTest.php
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
 * Test the SapoVideos Provider
 */
final class SapoVideosTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://videos.sapo.pt/#vhs-cM2ZwdjnZodaDpUpnSzk',
            'https://rd.videos.sapo.pt/n5VQ486nR4MYJEhYGbER?jwsource=cl',
            'http://videos.sapo.pt/#vhs-Zo7klhz1YiRWT8OTTAfW',
        ],
        'invalid_urls' => [
            'http://videos.sapo.pt/',
        ],
        'normalize_urls' => [
            'http://videos.sapo.pt/#vhs-cM2ZwdjnZodaDpUpnSzk' => 'https://videos.sapo.pt/cM2ZwdjnZodaDpUpnSzk',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('SapoVideos', [ 'width' => 480, 'height' => 270]);
    }
}
