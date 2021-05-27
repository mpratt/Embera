<?php
/**
 * GetShowTest.php
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
 * Test the GetShow Provider
 */
final class GetShowTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://present.getshow.io/share/Mcm3a3YBgj8xrtrWURYz',
            //'https://app.getshow.io/embed/iframe/?media=Mcm3a3YBgj8xrtrWURYz',
        ],
        'invalid_urls' => [
            'https://app.getshow.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GetShow', [ 'width' => 480, 'height' => 270]);
    }
}
