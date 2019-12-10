<?php
/**
 * FitappTest.php
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
 * Test the Fitapp Provider
 */
final class FitappTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fitapp.pro/w/NyWxXR7tb',
        ],
        'invalid_urls' => [
            'https://fitapp.pro/',
            'https://fitapp.pro/professional',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Fitapp', [ 'width' => 480, 'height' => 270]);
    }
}
