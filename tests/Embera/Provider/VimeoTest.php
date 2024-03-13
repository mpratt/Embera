<?php
/**
 * VimeoTest.php
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
 * Test the Vimeo Provider
 */
final class VimeoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vimeo.com/375646424',
            'https://vimeo.com/491313737',
            'https://vimeo.com/583870374',
        ],
        'invalid_urls' => [
            'https://vimeo.com/',
            'https://vimeo.com/video',
        ],
        'normalize_urls' => [
            'http://vimeo.com/groups/shortfilms/videos/66185763' => 'https://vimeo.com/groups/shortfilms/videos/66185763',
            'https://vimeo.com/919781633/aaaaaaaaaa' => 'https://vimeo.com/919781633/aaaaaaaaaa',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Vimeo', ['width' => 480, 'height' => 270]);
    }
}
