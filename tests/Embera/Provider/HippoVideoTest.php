<?php
/**
 * HippoVideoTest.php
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
 * Test the HippoVideo Provider
 */
final class HippoVideoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.hippovideo.io/video/play/jzzYRcktQ6JP8xP_49jaaw',
        ],
        'invalid_urls' => [
            'https://www.hippovideo.io/',
            'https://www.hippovideo.io/video/play/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('HippoVideo', [ 'width' => 480, 'height' => 270]);
    }
}
