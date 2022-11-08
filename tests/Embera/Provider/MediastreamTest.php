<?php
/**
 * MediastreamTest.php
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
 * Test the Mediastream Provider
 */
final class MediastreamTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mdstrm.com/embed/6266eda4a18ad20185e0d3b4',
            'https://mdstrm.com/live-stream/630e029aef211f08502f0815',
            'https://mdstrm.com/image/62c30bd7cace843827c6f6c7',
        ],
        'invalid_urls' => [
            'https://mdstrm.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Mediastream', [ 'width' => 480, 'height' => 270]);
    }
}
