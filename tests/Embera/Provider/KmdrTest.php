<?php
/**
 * KmdrTest.php
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
 * Test the Kmdr Provider
 */
final class KmdrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.kmdr.sh/history/7f3df902-129d-4af0-bc20-b0f0bc5869dd',
        ],
        'invalid_urls' => [
            'https://app.kmdr.sh/'
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Kmdr', [ 'width' => 480, 'height' => 270]);
    }
}
