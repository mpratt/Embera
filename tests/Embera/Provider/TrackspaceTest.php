<?php
/**
 * TrackspaceTest.php
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
 * Test the Trackspace Provider
 */
final class TrackspaceTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://trackspace.upitup.com/track/17',
            'https://trackspace.upitup.com/user/test-user-mrxme',
        ],
        'invalid_urls' => [
            'https://trackspace.upitup.com',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Trackspace seems to be down. Skipping tests for now.');
        //$this->validateProvider('Trackspace', [ 'width' => 480, 'height' => 270]);
    }
}
