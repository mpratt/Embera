<?php
/**
 * TumblTest.php
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
 * Test the Tumbl Provider
 */
final class TumblrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://staff.tumblr.com/post/619193383820410880/have-a-post-youre-particularly-proud-of',
        ],
        'invalid_urls' => [
            'https://staff.tumblr.com/619193383820410880/have-a-post-youre-particularly-proud-of',
            'https://staff.tumblr.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Tumblr', [ 'width' => 480, 'height' => 270]);
    }
}
