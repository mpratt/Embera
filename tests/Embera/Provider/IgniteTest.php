<?php
/**
 * IgniteTest.php
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
 * Test the Ignite Provider
 */
final class IgniteTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://ignite.euvideocdn.com/player/index.html?id=673b224ef9ce0fa529d3ecf1',
            'https://ignite.euvideocdn.com/watch/video/673b224ef9ce0fa529d3ecf1',
        ],
        'invalid_urls' => [
            'https://ignite.euvideocdn.com',
            'https://ignite.euvideocdn.com/player/index.html',
            'https://ignite.euvideocdn.com/watch/video',
            'https://ignite.euvideocdn.com/watch/movie/673b224ef9ce0fa529d3ecf1',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Ignite', [ 'width' => 480, 'height' => 270]);
    }
}
