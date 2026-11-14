<?php
/**
 * IcosaGalleryTest.php
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
 * Test the IcosaGallery Provider
 */
final class IcosaGalleryTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://icosa.gallery/view/9L2Lt-sxzdp',
        ],
        'invalid_urls' => [
            'https://icosa.gallery',
            'https://icosa.gallery/view',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('IcosaGallery', [ 'width' => 480, 'height' => 270]);
    }
}
