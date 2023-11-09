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
            'https://www.kickstarter.com/projects/turncoatgames/bound-a-print-at-home-abstract-strategy-game'
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
        $this->markTestSkipped('Kickstarter is not working at the moment the crawler is not passing the cloudflare challenge. Deleting if this continues (2023-02-13).');
        // $this->validateProvider('Kickstarter', [ 'width' => 480, 'height' => 270]);
    }
}
