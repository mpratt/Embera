<?php
/**
 * SlideshareTest.php
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
 * Test the Slideshare Provider
 */
final class SlideshareTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.slideshare.net/haraldf/business-quotes-for-2011',
            'https://slideshare.net/reidhoffman/blitzscaling-book-trailer-118631898',
            'https://www.slideshare.net/NVIDIA/top-5-stories-in-design-and-visualization-apr-9th-2018?query=string',
        ],
        'invalid_urls' => [
            'https://slideshare.net',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Slideshare', [ 'width' => 480, 'height' => 270]);
    }
}
