<?php
/**
 * PadletTest.php
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
 * Test the Padlet Provider
 */
final class PadletTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://padlet.com/cogdogblog/aos9fosbbwk4',
        ],
        'invalid_urls' => [
            'https://padlet.com/',
            'https://padlet.com/cogdogblog/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Padlet', [ 'width' => 480, 'height' => 270]);
    }
}
