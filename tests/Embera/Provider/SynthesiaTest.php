<?php
/**
 * SynthesiaTest.php
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
 * Test the Synthesia Provider
 */
final class SynthesiaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://share.synthesia.io/bcd7bafb-3614-4ab4-8644-75b73bec25de',
        ],
        'invalid_urls' => [
            'https://share.synthesia.io',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('The Synthesia Provider requires that we have a private video.');
        //$this->validateProvider('Synthesia', [ 'width' => 480, 'height' => 270]);
    }
}
