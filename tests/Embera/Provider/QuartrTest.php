<?php
/**
 * QuartrTest.php
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
 * Test the Quartr Provider
 */
final class QuartrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://web.quartr.com/companies/3706/events/215125',
        ],
        'invalid_urls' => [
            'https://web.quartr.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Quartr', [ 'width' => 480, 'height' => 270]);
    }
}
