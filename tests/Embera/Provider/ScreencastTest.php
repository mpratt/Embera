<?php
/**
 * ScreencastTest.php
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
 * Test the Screencast Provider
 */
final class ScreencastTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.screencast.com/t/JR3TiP5Dds',
            'https://www.screencast.com/users/JonSzostek/folders/Unit%201/media/2a1fdf82-a1f5-416f-85ab-813170523c1d',
            'https://www.screencast.com/users/JonSzostek/folders/PAP%20Unit%205/media/4f8c7cb2-863d-45ab-b76c-cb4026545b84',
        ],
        'invalid_urls' => [
            'https://www.screencast.com/',
            'https://www.screencast.com/t/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Screencast', [ 'width' => 480, 'height' => 270]);
    }
}
