<?php
/**
 * DalexniTest.php
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
 * Test the Dalexni Provider
 */
final class DalexniTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://dalexni.com/i/costa-rica.DT0',
        ],
        'invalid_urls' => [
            'https://dalexni.com/oembed/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Dalexni: We dont have a valid/public url to test');
        // $this->validateProvider('Dalexni', [ 'width' => 480, 'height' => 270]);
    }
}
