<?php
/**
 * PodbeanTest.php
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
 * Test the Podbean Provider
 */
final class PodbeanTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://podcast.podbean.com/e/jen-and-vernon-chat-podcast-resolutions-twitter-advice-and-predictions-for-2019/',
            'https://pretaporter.podbean.com/e/pret-a-porter-dos-bastidores-a-passarela-da-modalisboa-collective/',
            'https://www.podbean.com/eas/pb-ab123-1234567',
            'https://www.podbean.com/media/share/pb-abcde-1234567',
        ],
        'invalid_urls' => [
            'https://podcast.podbean.com/',
            'https://podbean.com/e/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Podbean', [ 'width' => 480, 'height' => 270]);
    }
}
