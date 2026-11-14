<?php
/**
 * HivoTest.php
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
 * Test the Hivo Provider
 */
final class HivoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://cdn.hivo.com.au/uploads/k7j3qmq8585wSriTf/original.jpeg',
        ],
        'invalid_urls' => [
            'https://cdn.hivo.com.au',
            'https://app.hivo.com.au',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Hivo', [ 'width' => 480, 'height' => 270]);
    }
}
