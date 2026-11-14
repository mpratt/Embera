<?php
/**
 * LividTest.php
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
 * Test the Livid Provider
 */
final class LividTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://livid.com/watch/AJPwABnzkTXj',
        ],
        'invalid_urls' => [
            'https://livid.com',
            'https://livid.com/watch',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Livid', [ 'width' => 480, 'height' => 270]);
    }
}
