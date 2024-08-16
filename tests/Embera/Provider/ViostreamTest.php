<?php
/**
 * ViostreamTest.php
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
 * Test the Viostream Provider
 */
final class ViostreamTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://share.viostream.com/nhedxond6q9w41',
        ],
        'invalid_urls' => [
            'https://share.viostream.com',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('The Viostream provider is not returning oembed data.');
        //$this->validateProvider('Viostream', [ 'width' => 480, 'height' => 270]);
    }
}
