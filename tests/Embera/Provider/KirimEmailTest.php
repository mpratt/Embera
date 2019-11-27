<?php
/**
 * KirimEmailTest.php
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
 * Test the KirimEmail Provider
 */
final class KirimEmailTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.halaman.email/form/205c01c4-88d9-4036-a326-20d87a996513',
        ],
        'invalid_urls' => [
            'http://www.halaman.email/',
            'http://www.halaman.email/form/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('KirimEmail', [ 'width' => 480, 'height' => 270]);
    }
}
