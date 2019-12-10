<?php
/**
 * ShortnoteTest.php
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
 * Test the Shortnote Provider
 */
final class ShortnoteTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.shortnote.jp/view/notes/ABvRWSqU',
            'https://www.shortnote.jp/view/notes/ALnpzl38',
            'https://www.shortnote.jp/view/notes/AJrJeuIk',
        ],
        'invalid_urls' => [
            'https://www.shortnote.jp/',
            'https://www.shortnote.jp/view/notes/AJrJeuIk/other-path',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Shortnote', [ 'width' => 480, 'height' => 270]);
    }
}
