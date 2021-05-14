<?php
/**
 * IdomooTest.php
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
 * Test the Idomoo Provider
 */
final class IdomooTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://liv.idomoo.com/1234/0000/abcdef.mp4',
        ],
        'invalid_urls' => [
            'http://liv.idomoo.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Idomoo is disabled because endpoint is down at the moment. Will remove it if this continues.');
        //$this->validateProvider('Idomoo', [ 'width' => 480, 'height' => 270]);
    }
}
