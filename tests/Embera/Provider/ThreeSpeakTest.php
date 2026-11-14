<?php
/**
 * ThreeSpeakTest.php
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
 * Test the ThreeSpeak Provider
 */
final class ThreeSpeakTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://3speak.tv/watch?v=seckorama/sumski-vinodol',
            'https://3speak.tv/shorts?v=bossdebz/fgdfx1ao',
        ],
        'invalid_urls' => [
            'https://3speak.tv',
            'https://3speak.tv/watch',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ThreeSpeak', [ 'width' => 480, 'height' => 270]);
    }
}
