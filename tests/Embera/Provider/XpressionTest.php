<?php
/**
 * XpressionTest.php
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
 * Test the Xpression Provider
 */
final class XpressionTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://web.xpression.jp/video/pr-25-12',
            'https://web.xpression.jp/video/pr-25-15',
            'https://web.xpression.jp/video/pr-25-29',
        ],
        'invalid_urls' => [
            'https://web.xpression.jp/',
            'https://web.xpression.jp/video/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Xpression', [ 'width' => 480, 'height' => 270]);
    }
}
