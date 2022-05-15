<?php
/**
 * AdiloTest.php
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
 * Test the Adilo Provider
 */
final class AdiloTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://adilo.bigcommand.com/watch/7DmeLyjk',
        ],
        'invalid_urls' => [
            'https://adilo.bigcommand.com/',
            'https://adilo.bigcommand.com/watch/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Adilo', [ 'width' => 480, 'height' => 270]);
    }
}
