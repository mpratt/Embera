<?php
/**
 * LivestreamTest.php
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
 * Test the Livestream Provider
 */
final class LivestreamTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.livestream.com/livestream/3camkit',
            'https://livestream.com/accounts/16936513/live',
        ],
        'invalid_urls' => [
            'https://livestream.com/',
            'https://livestream.com/accounts/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Livestream', [ 'width' => 480, 'height' => 270]);
    }
}
