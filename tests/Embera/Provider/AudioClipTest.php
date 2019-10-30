<?php
/**
 * AudioClipTest.php
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
 * Test the AudioClip Provider
 */
final class AudioClipTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://audioclip.naver.com/audiobooks/A41E41E6B1',
            'https://audioclip.naver.com/channels/1381/clips/330',
            'https://audioclip.naver.com/audiobooks/FE8C3FCBB6',
        ),
        'invalid_urls' => array(
            'https://audioclip.naver.com/data/audiobooks/FE8C3FCBB6',
        ),
        'normalize_urls' => array(
            'http://audioclip.naver.com/audiobooks/FE8C3FCBB6' => 'https://audioclip.naver.com/audiobooks/FE8C3FCBB6',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('AudioClip', [ 'width' => 480, 'height' => 270]);
    }
}
