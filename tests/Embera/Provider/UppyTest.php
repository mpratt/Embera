<?php
/**
 * UppyTest.php
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
 * Test the Uppy Provider
 */
final class UppyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.uppy.jp/shares/video?pid=234679d3-3a4d-4d59-9036-4c926f8b901f&share_id=c4856a10-dd3c-4b82-946e-50dc065bf829',
        ],
        'invalid_urls' => [
            'https://app.uppy.jp/shares/video',
            'https://app.uppy.jp/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Uppy', [ 'width' => 480, 'height' => 270]);
    }
}
