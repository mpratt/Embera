<?php
/**
 * PosixionTest.php
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
 * Test the Posixion Provider
 */
final class PosixionTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://posixion.com/question/Sollten-wir-posiXion-weiter-pushen',
        ],
        'invalid_urls' => [
            'https://posixion.com/',
            'https://posixion.com/question/',
            'https://posixion.com/user/iFKQSoh4nz9X4GaLJ',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('Posixion seems to be down. Flagging this as deprecated, soon to be removed');
        //$this->validateProvider('Posixion', [ 'width' => 480, 'height' => 270]);
    }
}
