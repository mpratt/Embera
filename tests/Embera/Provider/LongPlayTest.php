<?php
/**
 * LongPlayTest.php
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
 * Test the LongPlay Provider
 */
final class LongPlayTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://longplayplatform.com/browse/M3P3YA9VH',
            'https://longplayplatform.com/embed/M3P3YA9VH',
            'https://longplayplatform.com/u/long-play-tutorials/c/long-play-tutorials',
        ],
        'invalid_urls' => [
            'https://longplayplatform.com',
            'https://longplayplatform.com/browse',
            'https://longplayplatform.com/u/long-play-tutorials',
            'https://longplayplatform.com/u/long-play-tutorials/c',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('LongPlay', [ 'width' => 480, 'height' => 270]);
    }
}
