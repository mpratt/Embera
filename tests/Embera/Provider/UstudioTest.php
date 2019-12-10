<?php
/**
 * UstudioTest.php
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
 * Test the Ustudio Provider
 */
final class UstudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embed.ustudio.com/embed/DhExfAxGHFYz/U8X71S93cklU',
            'https://authorized-embed.ustudio.com/embed/DWe7KApmMXBZ',
        ],
        'invalid_urls' => [
            'https://embed.ustudio.com/',
            'https://embed.ustudio.com/stuff/U8X71S93cklU',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Ustudio', [ 'width' => 480, 'height' => 270]);
    }
}
