<?php
/**
 * LillePodTest.php
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
 * Test the LillePod Provider
 */
final class LillePodTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://pod.univ-lille.fr/video/24647-blacks-vets-episode-2-the-job-interview-channel-4mp4/'
        ],
        'invalid_urls' => [
            'https://pod.univ-lille.fr/',
            'https://pod.univ-lille.fr/video/',
            'https://pod.univ-lille.fr/video/7029-ue-culture-numerique-scenario-dusage-presentation-sous-canva', // No slash at the end
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('LillePod', [ 'width' => 480, 'height' => 270]);
    }
}
