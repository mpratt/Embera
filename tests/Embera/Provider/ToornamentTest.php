<?php
/**
 * ToornamentTest.php
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
 * Test the Toornament Provider
 */
final class ToornamentTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.toornament.com/en_GB/tournaments/3074816977978105856/matches/schedule',
            'https://www.toornament.com/en_GB/tournaments/3074816977978105856/stages/3077665939199852544/',
            'https://www.toornament.com/en_GB/tournaments/3074816977978105856/information',
        ],
        'invalid_urls' => [
            'https://www.toornament.com/',
            'https://www.toornament.com/en_GB/tournaments/3074816977978105856/stages/', // This is invalid oembed
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Toornament', [ 'width' => 480, 'height' => 270]);
    }
}
