<?php
/**
 * NanooTest.php
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
 * Test the Nanoo Provider
 */
final class NanooTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.nanoo.tv/link/v/ndomfytP',
            'https://nanoo.pro/link/v/kpqsGpPV',
            'http://www.nanoo.tv/link/v/BPdhsABr',
        ],
        'invalid_urls' => [
            'https://www.nanoo.tv/',
            'https://www.nanoo.tv/path/v/BPdhsABr',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Nanoo', [ 'width' => 480, 'height' => 270]);
    }
}
