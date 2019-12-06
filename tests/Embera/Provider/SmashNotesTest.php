<?php
/**
 * SmashNotesTest.php
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
 * Test the SmashNotes Provider
 */
final class SmashNotesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://smashnotes.com/p/below-the-line-with-james-beshara/e/1-justin-kan',
            'https://smashnotes.com/p/naval/e/being-ethical-is-long-term-greedy',
            'https://smashnotes.com/p/give-first',
        ],
        'invalid_urls' => [
            'https://smashnotes.com/',
            'https://smashnotes.com/p/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('SmashNotes', [ 'width' => 480, 'height' => 270]);
    }
}
