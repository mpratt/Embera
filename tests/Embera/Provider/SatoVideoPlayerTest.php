<?php
/**
 * SatoVideoPlayerTest.php
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
 * Test the SatoVideoPlayer Provider
 */
final class SatoVideoPlayerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://api.satoplayer.com/players/embed/b462c7f1-ef56-4a49-8183-d10312ad79ab',
            'https://api.satoplayer.com/players/embed/d8488f72-e899-4068-bd28-81302f91e554',
        ],
        'invalid_urls' => [
            'http://satoplayer.com',
            'https://api.satoplayer.com/players/embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SatoVideoPlayer', [ 'width' => 480, 'height' => 270]);
    }
}
