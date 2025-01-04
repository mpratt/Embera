<?php
/**
 * NebulaTest.php
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
 * Test the Nebula Provider
 */
final class NebulaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://nebula.tv/videos/jetlag-season-seven-trailer',
            'https://nebula.tv/videos/patrickhwillems-night-of-the-coconut',
        ],
        'invalid_urls' => [
            'https://nebula.tv',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Nebula', [ 'width' => 480, 'height' => 270]);
    }
}
