<?php
/**
 * KickstarterTest.php
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
 * Test the Kickstarter Provider
 */
final class KickstarterTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.kickstarter.com/projects/svc/one-river-a-thousand-voices?ref=section-homepage-view-more-discovery-p1',
            'https://www.kickstarter.com/projects/wilderwoventarot/the-wilderwoven-tarot',
            'http://www.kickstarter.com/projects/valentinacanavesio/marianne-0',
        ],
        'invalid_urls' => [
            'https://www.kickstarter.com/',
            'https://www.kickstarter.com/projects/',
            'https://www.kickstarter.com/projects/valentinacanavesio',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Kickstarter', [ 'width' => 480, 'height' => 270]);
    }
}
