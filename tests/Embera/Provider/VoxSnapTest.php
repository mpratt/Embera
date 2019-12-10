<?php
/**
 * VoxSnapTest.php
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
 * Test the VoxSnap Provider
 */
final class VoxSnapTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://article.voxsnap.com/nirandfar/the-psychology-of-a-billion-dollar-enterprise-app',
            'https://article.voxsnap.com/ycombinator/ceo',
            'https://article.voxsnap.com/ycombinator/hiring',
        ],
        'invalid_urls' => [
            'https://article.voxsnap.com/',
            'https://article.voxsnap.com/ycombinator/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('VoxSnap', [ 'width' => 480, 'height' => 270]);
    }
}
