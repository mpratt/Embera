<?php
/**
 * GeographCITest.php
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
 * Test the GeographCI Provider
 */
final class GeographCITest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://channel-islands.geographs.org/photo/1166',
            'http://channel-islands.geographs.org/photo/952',
            'http://channel-islands.geographs.org/photo/1231',
            'http://channel-islands.geographs.org.je/photo/961',
            'http://channel-islands.geographs.org.gg/photo/984',
            'http://channel-islands.geographs.org/photo/656',
        ],
        'invalid_urls' => [
            'http://channel-islands.geographs.org/',
            'http://channel-islands.geographs.org/submit.php',
        ],
        'normalize_urls' => [
            'http://channel-islands.geographs.org.gg/photo/984/?query=string' => 'https://channel-islands.geographs.org.gg/photo/984',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GeographCI', [ 'width' => 480, 'height' => 270]);
    }
}
