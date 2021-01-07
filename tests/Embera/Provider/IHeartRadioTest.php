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
            'https://www.iheart.com/podcast/the-breakfast-club-24992238/',
            'https://www.iheart.com/podcast/the-breakfast-club-24992238/episode/whats-the-flex-75922628/',
            'https://www.iheart.com/podcast/the-breakfast-club-24992238/episode/pandemic-should-nots-75831309/',
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
