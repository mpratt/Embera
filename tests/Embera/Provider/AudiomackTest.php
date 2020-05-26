<?php
/**
 * AudiomackTest.php
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
 * Test the Audiomack Provider
 */
final class AudiomackTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://audiomack.com/song/quando-rondo/just-keep-going',
            'http://www.audiomack.com/album/jaydayounganmusic/misunderstood',
            'https://audiomack.com/playlist/joevango/verified-rnb?stuff',
            'https://audiomack.com/audiomack/playlist/just-chillin',
        ),
        'invalid_urls' => array(
            'https://audiomack.com/song/quando-rondo/just-keep-going/other-stuff',
        ),
        'normalize_urls' => array(
            'http://audiomack.com/playlist/joevango/verified-rnb?stuff' => 'https://audiomack.com/playlist/joevango/verified-rnb',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Audiomack', [ 'width' => 480, 'height' => 270]);
    }
}
