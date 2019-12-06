<?php
/**
 * SimplecastTest.php
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
 * Test the Simplecast Provider
 */
final class SimplecastTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://simplecast.com/s/7fe152f4',
        ],
        'invalid_urls' => [
            'https://simplecast.com/',
            'https://tgd.simplecast.com/episodes/dan-blackman-and-robyn-kanner-the-power'
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Simplecast', [ 'width' => 480, 'height' => 270]);
    }
}
