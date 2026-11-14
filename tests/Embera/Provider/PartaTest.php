<?php
/**
 * PartaTest.php
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
 * Test the Parta Provider
 */
final class PartaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.parta.io/core/embed/64aa2e0b-fa85-4681-a2ce-662e856c2b97',
        ],
        'invalid_urls' => [
            'https://parta.io',
            'https://app.parta.io/core/embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Parta', [ 'width' => 480, 'height' => 270]);
    }
}
