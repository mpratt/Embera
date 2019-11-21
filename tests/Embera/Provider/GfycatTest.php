<?php
/**
 * GfycatTest.php
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
 * Test the Gfycat Provider
 */
final class GfycatTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://gfycat.com/ableaggressiveilsamochadegu-mtv-awards-2017-millie-bobby-brown',
            'https://gfycat.com/helplessbleakalaskanmalamute-rabbit-floppy-cute-ears-aww',
            'https://gfycat.com/favoritecreativeauk-monologue-confused-comedian-colbert-stephen-dont',
        ],
        'invalid_urls' => [
            'https://gfycat.com',
            'https://gfycat.com/sound-gifs',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Gfycat', [ 'width' => 480, 'height' => 270]);
    }
}
