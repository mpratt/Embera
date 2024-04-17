<?php
/**
 * BlueskySocialTest.php
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
 * Test the BlueskySocial Provider
 */
final class BlueskySocialTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://bsky.app/profile/did:plc:vjug55kidv6sye7ykr5faxxn/post/3jzn6g7ixgq2y',
            'https://bsky.app/profile/emilyliu.me/post/3jzn6g7ixgq2y',
        ],
        'invalid_urls' => [
            'https://bsky.app',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('BlueskySocial', [ 'width' => 480, 'height' => 270]);
    }
}
