<?php
/**
 * ImgurTest.php
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
 * Test the Imgur Provider
 */
final class ImgurTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://imgur.com/gallery/XmZddpu',
            'https://imgur.com/t/funny/qXJrHB0',
        ],
        'invalid_urls' => [
            'https://imgur.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Imgur', [ 'width' => 480, 'height' => 270]);
    }
}
