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
            'https://www.trillertv.com/watch/aew-dynamite-episode-34-24/2pfgg/',
            'https://www.trillertv.com/watch/aew-full-gear-2022/2pc1y/'
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
