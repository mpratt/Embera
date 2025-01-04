<?php
/**
 * PeerTubeTVTest.php
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
 * Test the PeerTube.TV Provider
 */
final class PeerTubeTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://peertube.tv/w/aGdswr2tWoiV255eNsjCYk',
            'https://peertube.tv/w/exh9sEQdGy7Ldz17W6hzP8',
        ],
        'invalid_urls' => [
            'https://peertube.tv/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('PeerTubeTV', [ 'width' => 480, 'height' => 270]);
    }
}
