<?php
/**
 * AudioboomTest.php
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
 * Test the Autioboom Provider
 */
final class AudioboomTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://audioboom.com/channel/therussellbrandpodcast',
            'https://audioboom.com/posts/3189619-the-final-episode',
            'https://audioboom.com/posts/7404319-you-cheated-in-my-dream'
        ),
        'invalid_urls' => array(
            'http://audioboom.com/posts/other-stuff/7404319-you-cheated-in-my-dream?text=data',
        ),
        'normalize_urls' => array(
            'http://audioboom.com/posts/7404319-you-cheated-in-my-dream?text=data' => 'https://audioboom.com/posts/7404319-you-cheated-in-my-dream',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Audioboom', [ 'width' => 480, 'height' => 270]);
    }
}
