<?php
/**
 * FITETest.php
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
 * Test the FITE Provider
 */
final class FITETest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.fite.tv/watch/roh-wrestling-episode-426/2p4x1/',
            'http://www.fite.tv/watch/fite-tv-test-stream/2kmfd/',
            // 'https://www.fite.tv/watch/pyramid-fights-14/2p457',
        ),
        'invalid_urls' => array(
            'https://www.fite.tv/watch/pyramid-fights-14',
            'https://www.fite.tv/',
        ),
        'normalize_urls' => array(
            'http://www.fite.tv/watch/fite-tv-test-stream/2kmfd/?query=string' => 'https://www.fite.tv/watch/fite-tv-test-stream/2kmfd/',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<div'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('FITE', [ 'width' => 480, 'height' => 270]);
    }
}
