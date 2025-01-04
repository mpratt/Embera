<?php
/**
 * AmtrakerTest.php
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
 * Test the Amtraker Provider
 */
final class AmtrakerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://amtraker.com/trains/9999',
        ],
        'invalid_urls' => [
            'https://amtraker.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Amtraker', [ 'width' => 480, 'height' => 270]);
    }
}
