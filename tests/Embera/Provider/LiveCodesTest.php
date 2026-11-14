<?php
/**
 * LiveCodesTest.php
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
 * Test the LiveCodes Provider
 */
final class LiveCodesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://livecodes.io/?template=react',
            'https://livecodes.io/?template=ruby',
        ],
        'invalid_urls' => [
            'https://livecodes.io',
            'https://livecodes.io/docs',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('LiveCodes', [ 'width' => 480, 'height' => 270]);
    }
}
