<?php
/**
 * PitchhubTest.php
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
 * Test the Pitchhub Provider
 */
final class PitchhubTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://player-dev.pitchhub.com/en/public/player/9330fd8734deb58345c80dd124203b57',
            'https://player-staging.pitchhub.com/en/public/player/296599c9ff2a945eb33d403929e92f35',
            'https://player.pitchhub.com/en/public/player/296599c9ff2a945eb33d403929e92f35',
        ],
        'invalid_urls' => [
            'https://pitchhub.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Pitchhub', [ 'width' => 480, 'height' => 270]);
    }
}
