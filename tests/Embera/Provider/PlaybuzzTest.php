<?php
/**
 * PlaybuzzTest.php
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
 * Test the Playbuzz Provider
 */
final class PlaybuzzTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.playbuzz.com/craigkelly10/which-james-dean-character-are-you',
            'https://www.playbuzz.com/item/8fb2343f-fa5d-48d4-8723-f8b5d51cc1a9',
        ],
        'invalid_urls' => [
            'https://www.playbuzz.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Playbuzz', [ 'width' => 480, 'height' => 270]);
    }
}
