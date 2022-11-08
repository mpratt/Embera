<?php
/**
 * TwinmotionTest.php
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
 * Test the Twinmotion Provider
 */
final class TwinmotionTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://twinmotion.unrealengine.com/presentation/0zxkXymuqH5He0mY',
            'https://twinmotion.unrealengine.com/panorama/Spp2t_okp3potEeE',
        ],
        'invalid_urls' => [
            'https://twinmotion.unrealengine.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Twinmotion', [ 'width' => 480, 'height' => 270]);
    }
}
