<?php
/**
 * ZingsoftTest.php
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
 * Test the Zingsoft Provider
 */
final class ZingsoftTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.zingsoft.com/demos/view/1PFW8TP3',
        ],
        'invalid_urls' => [
            'https://app.zingsoft.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Zingsoft', [ 'width' => 480, 'height' => 270]);
    }
}
