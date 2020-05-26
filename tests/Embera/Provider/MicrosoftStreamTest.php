<?php
/**
 * MicrosoftStreamTest.php
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
 * Test the MicrosoftStream Provider
 */
final class MicrosoftStreamTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://web.microsoftstream.com/video/f6df81b2-9438-4154-b32c-c023ebb2a4e3',
        ],
        'invalid_urls' => [
            'https://web.microsoftstream.com/f6df81b2-9438-4154-b32c-c023ebb2a4e3',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MicrosoftStream', [ 'width' => 480, 'height' => 270]);
    }
}
