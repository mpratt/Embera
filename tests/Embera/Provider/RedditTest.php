<?php
/**
 * RedditTest.php
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
 * Test the Reddit Provider
 */
final class RedditTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.reddit.com/r/aww/comments/e6h055/pawttery/',
            'https://www.reddit.com/r/aww/comments/e6gd6q/little_guy_trying_to_scare_human/',
            'https://www.reddit.com/r/aww/comments/e6f7rz/cat_nap/',
        ],
        'invalid_urls' => [
            'https://www.reddit.com/',
            'https://www.reddit.com/r/aww/comments/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Reddit', [ 'width' => 480, 'height' => 270]);
    }
}
