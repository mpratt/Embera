<?php
/**
 * ZoomableTest.php
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
 * Test the Zoomable Provider
 */
final class ZoomableTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://srv2.zoomable.ca/viewer.php?i=img3665da501a53181f_lucas-benjamin-wQLAGv4_OYs-unsplash',
        ],
        'invalid_urls' => [
            'https://zoomable.ca/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Zoomable', [ 'width' => 480, 'height' => 270]);
    }
}
