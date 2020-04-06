<?php
/**
 * OzTest.php
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
 * Test the Oz Provider
 */
final class OzTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.oz.com/musicreach/video/db012194-5e95-40bf-a810-c2cc84a7bf7f?query=string',
            'https://www.oz.com/drsports/video/802a1be3-37d9-4723-a388-5b9eebb5f79c',
        ],
        'invalid_urls' => [
            'https://www.oz.com/',
            'https://www.oz.com/gnarr/video/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Oz', [ 'width' => 480, 'height' => 270]);
    }
}
