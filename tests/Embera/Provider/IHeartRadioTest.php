<?php
/**
 * IHeartRadioTest.php
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
 * Test the IHeartRadio Provider
 */
final class IHeartRadioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.iheart.com/podcast/269-the-joe-rogan-experience-27959911/',
            'https://www.iheart.com/podcast/269-the-joe-rogan-experience-27959911/episode/1418-don-gavin-56257993/',
            'https://iheart.com/podcast/105-stuff-you-should-know-26940277/episode/barefoot-running-the-best-podcast-episode-56230477/',
        ],
        'invalid_urls' => [
            'https://www.iheart.com/',
            'https://www.iheart.com/podcast/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('IHeartRadio', [ 'width' => 480, 'height' => 270]);
    }
}
