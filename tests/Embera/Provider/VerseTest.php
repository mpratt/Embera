<?php
/**
 * VerseTest.php
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
 * Test the Verse Provider
 */
final class VerseTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.verse.com/stories/2086-day-zero/',
        ],
        'invalid_urls' => [
            'https://www.verse.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Verse', [ 'width' => 480, 'height' => 270]);
    }
}
