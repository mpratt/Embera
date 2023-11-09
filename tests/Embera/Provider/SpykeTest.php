<?php
/**
 * SpykeTest.php
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
 * Test the Spyke Provider
 */
final class SpykeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://spyke.social/p/01HDH1QH9RX705JE1YJS2225MW',
        ],
        'invalid_urls' => [
            'https://spyke.social/01HDH1QH9RX705JE1YJS2225MW',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Spyke', [ 'width' => 480, 'height' => 270]);
    }
}
