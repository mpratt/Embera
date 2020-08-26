<?php
/**
 * YoutubeTest.php
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
 * Test the youtube.com Provider
 */
final class YoutubeTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.youtube.com/watch?v=9bZkp7q19f0',
            'http://youtube.com/watch?v=J---aiyznGQ',
            'https://www.youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
            'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW',
            'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
            'https://m.youtube.com/watch?v=mghhLqu31cQ',
            'https://m.youtube.com/watch?v=wB3sjAIARIY',
            'http://youtube.com/embed/mghhLqu31cQ',
            'http://youtu.be/mghhLqu31cQ',
        ),
        'invalid_urls' => array(
            'http://youtube.com/watch?list=hi',
            'http://youtube.com /watch?video=J---aiyznGQ',
            'http://www.youtu.be.com/watch?lol=no',
            'http://www.youtube.com/hi#ho',
            'http://youtube.com/',
            'http://www.youtube.com/?id=ho'
        ),
        'normalize_urls' => array(
            'http://youtu.be/9bZkp7q19f0/werwer' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
            'http://www.youtube.com/watch?v=9bZkp7q19f0' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
            'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1' => 'https://www.youtube.com/watch?v=xVrJ8DxECbg',
            'http://youtu.be/8aGEb_yUpMs' => 'https://www.youtube.com/watch?v=8aGEb_yUpMs',
            'http://youtube.com/watch?v=J---aiyznGQ&index=1' => 'https://www.youtube.com/watch?v=J---aiyznGQ',
            'http://youtube.com/watch?v=mghhLqu31cQ' => 'https://www.youtube.com/watch?v=mghhLqu31cQ',
            'http://youtube.com/embed/mghhLqu31cQ' => 'https://www.youtube.com/watch?v=mghhLqu31cQ',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Youtube', [ 'width' => 480, 'height' => 270]);
    }
}
