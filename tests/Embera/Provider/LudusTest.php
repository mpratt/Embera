<?php
/**
 * LudusTest.php
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
 * Test the Ludus Provider
 */
final class LudusTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.ludus.one/fd01598e-5ed7-4edb-8d0e-cf75a36e0a07',
            'https://app.ludus.one/a4465cd5-ee82-4534-9755-5e658a7cb198#1',
            'https://app.ludus.one/311491f1-0684-4732-88ac-6249ef13a346#1',
        ],
        'invalid_urls' => [
            'https://app.ludus.one/',
            'https://app.ludus.one/fd01598e-5ed7',
            'https://app.ludus.one/a4465cd5-ee82-4534-9755-5e658a7cb198/pdf?quality=0.8&multiplier=2',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Ludus', [ 'width' => 480, 'height' => 270]);
    }
}
