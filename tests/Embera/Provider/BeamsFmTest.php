<?php
/**
 * Beams.fmTest.php
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
 * Test the Beams.fm Provider
 */
final class BeamsFmTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://beams.fm/chamberlaincoffee/kIxlbOMMQqSaer90DDOYF6w',
        ],
        'invalid_urls' => [
            'https://beams.fm/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('The Beams.fm Provider has been disabled as it seems to have changed their business.');
        //$this->validateProvider('BeamsFm', [ 'width' => 480, 'height' => 270]);
    }
}
