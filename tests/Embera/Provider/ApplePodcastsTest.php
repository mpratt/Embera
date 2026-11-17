<?php
/**
 * ApplePodcastsTest.php
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
 * Test the ApplePodcasts Provider
 */
final class ApplePodcastsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://podcasts.apple.com/us/podcast/the-daily/id1200361736',
            'https://podcasts.apple.com/us/podcast/id1200361736',
            'https://podcasts.apple.com/us/podcast/democrats-promised-lower-prices-what-can-they-actually-do/id1200361736?i=1000802453646',
        ],
        'invalid_urls' => [
            'https://podcasts.apple.com',
            'https://podcasts.apple.com/us/browse',
            'https://podcasts.apple.com/us/podcast/the-daily',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ApplePodcasts', [ 'width' => 480, 'height' => 270]);
    }
}
