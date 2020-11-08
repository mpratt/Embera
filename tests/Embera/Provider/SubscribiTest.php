<?php
/**
 * SubscribiTest.php
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
 * Test the Subscribi Provider
 */
final class SubscribiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://subscribi.io/subscribe/5f63b2b306cb71c069272c47',
        ],
        'invalid_urls' => [
            'https://subscribi.io/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Subscribi', [ 'width' => 480, 'height' => 270]);
    }
}
