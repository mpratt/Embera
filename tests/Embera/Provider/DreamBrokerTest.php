<?php
/**
 * DreamBrokerTest.php
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
 * Test the DreamBroker Provider
 */
final class DreamBrokerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.dreambroker.com/channel/lelk6szy/pt429u1j',
        ],
        'invalid_urls' => [
            'https://www.dreambroker.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('DreamBroker', [ 'width' => 480, 'height' => 270]);
    }
}
