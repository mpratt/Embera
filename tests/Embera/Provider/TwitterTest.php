<?php
/**
 * TwitterTest.php
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
 * Test the Twitter Provider
 */
final class TwitterTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://twitter.com/pewdiepie/status/1203031916796170240',
            'https://twitter.com/pewdiepie/status/1200516955817398272',
            'https://twitter.com/pewdiepie/status/1197857416639066112',
        ],
        'invalid_urls' => [
            'https://twitter.com/',
            'https://twitter.com/pewdiepie/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Twitter', [ 'width' => 480, 'height' => 270]);
    }
}
