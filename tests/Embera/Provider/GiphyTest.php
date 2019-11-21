<?php
/**
 * GiphyTest.php
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
 * Test the Giphy Provider
 */
final class GiphyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://giphy.com/gifs/ok-boomer-XAahcVQAyGeBdDKNFO/links',
            'https://media.giphy.com/media/h2ZHQz3yfu9MC5IAXJ/giphy.gif',
            'https://giphy.com/gifs/Rfk9VTK1GcwOpAPwsm/html5',
        ],
        'invalid_urls' => [
            'https://giphy.com/',
            'https://giphy.com/stuff/Rfk9VTK1GcwOpAPwsm/html5',
        ],
        'normalize_urls' => [
            'https://giphy.com/gifs/ok-boomer-XAahcVQAyGeBdDKNFO/links' => 'http://giphy.com/gifs/ok-boomer-XAahcVQAyGeBdDKNFO',
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Giphy', [ 'width' => 480, 'height' => 270]);
    }
}
