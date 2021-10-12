<?php
/**
 * StreamioTest.php
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
 * Test the Streamio Provider
 */
final class StreamioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://23m.io/yDa7W',
            'https://s3m.io/rCNma',
        ],
        'invalid_urls' => [
            'https://s3m.io/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Streamio', [ 'width' => 480, 'height' => 270]);
    }
}
