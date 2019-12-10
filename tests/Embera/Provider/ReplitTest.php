<?php
/**
 * ReplitTest.php
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
 * Test the Replit Provider
 */
final class ReplitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://repl.it/repls/GloriousMotherlyButton',
            'https://repl.it/repls/HurtfulTrimDimension',
        ],
        'invalid_urls' => [
            'http://repl.it/',
            'http://repl.it/@timmy_i_chen',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Replit', [ 'width' => 480, 'height' => 270]);
    }
}
