<?php
/**
 * TonicAudioTest.php
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
 * Test the TonicAudio Provider
 */
final class TonicAudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tnic.io/song/YsiaUAFouw',
            'https://tnic.io/take/h4QIxVnhLL',
        ],
        'invalid_urls' => [
            'https://tnic.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TonicAudio', [ 'width' => 480, 'height' => 270]);
    }
}
