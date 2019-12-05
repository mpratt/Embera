<?php
/**
 * PixdorTest.php
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
 * Test the Pixdor Provider
 */
final class PixdorTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://store.pixdor.com/map/10/show',
            'https://store.pixdor.com/place-marker-widget/20/show',
        ],
        'invalid_urls' => [
            'https://pixdor.com/map/10/show',
            'https://store.pixdor.com/map/10/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Pixdor', [ 'width' => 480, 'height' => 270]);
    }
}
