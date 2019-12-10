<?php
/**
 * GettyImagesTest.php
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
 * Test the GettyImages Provider
 */
final class GettyImagesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.gettyimages.com/detail/foto/portrait-of-29-year-old-african-american-man-imagen-libre-de-derechos/1181947734?query=string',
            'http://gettyimages.com/detail/1155368500',
            'https://www.gettyimages.com/detail/foto/young-cheerleader-girl-with-pom-poms-jumping-imagen-libre-de-derechos/843256296?uiloc=thumbnail_similar_images_adp',
        ],
        'invalid_urls' => [
            'http://gettyimages.com/',
        ],
        'normalize_urls' => [
            'https://www.gettyimages.com/detail/foto/portrait-of-29-year-old-african-american-man-imagen-libre-de-derechos/1181947734?query=string' => 'https://gty.im/1181947734',
            'http://gettyimages.com/detail/1155368500' => 'https://gty.im/1155368500',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GettyImages', [ 'width' => 480, 'height' => 270]);
    }
}
