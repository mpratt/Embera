<?php
/**
 * PodcastPizzaTest.php
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
 * Test the PodcastPizza Provider
 */
final class PodcastPizzaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://podcast.pizza/shows/spirit-of-the-midwest',
        ],
        'invalid_urls' => [
            'https://podcast.pizza',
            'https://podcast.pizza/shows',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('PodcastPizza', [ 'width' => 480, 'height' => 270]);
    }
}
