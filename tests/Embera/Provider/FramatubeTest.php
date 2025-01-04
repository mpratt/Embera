<?php
/**
 * FramatubeTest.php
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
 * Test the Framatube Provider
 */
final class FramatubeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://framatube.org/w/s8F6UuWwR9NhzhJWBYk5zf',
        ],
        'invalid_urls' => [
            'https://framatube.org',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Framatube', [ 'width' => 480, 'height' => 270]);
    }
}
