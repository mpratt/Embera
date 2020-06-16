<?php
/**
 * RunKitTest.php
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
 * Test the RunKit Provider
 */
final class RunKitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://runkit.com/runkit/welcome',
            'https://runkit.com/tonic/d3-example-from-beaker',
        ],
        'invalid_urls' => [
            'https://runkit.com/',
            'https://runkit.com/tonic/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('RunKit', [ 'width' => 480, 'height' => 270]);
    }
}
