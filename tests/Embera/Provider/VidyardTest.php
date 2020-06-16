<?php
/**
 * VidyardTest.php
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
 * Test the Vidyard Provider
 */
final class VidyardTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://video.vidyard.com/watch/njifKy4aJ5PgdYMf9GRNjU',
        ],
        'invalid_urls' => [
            'https://video.vidyard.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Vidyard', [ 'width' => 480, 'height' => 270]);
    }
}
