<?php
/**
 * KakaoTVTest.php
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
 * Test the KakaoTV Provider
 */
final class KakaoTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tv.kakao.com/channel/2967954/cliplink/403996835',
            'https://tv.kakao.com/channel/3402309/cliplink/404162359?fbId=eyJhbGciOiJub25lIn0.eyJpbXByZXNzaW9uSWQiOm51bGwsInQiOiJzMiIsInNlc3Npb25JZCI6IjgyNzc4ZGYxNTkzMjdhNGYxMTYyMzg2NmJiYjMwMTZiIn0.',
            'https://tv.kakao.com/channel/3402309/cliplink/404189658?act=smr_recommended',
        ],
        'invalid_urls' => [
            'https://tv.kakao.com/',
            'https://tv.kakao.com/channel/3402309/cliplink/404189658/other-stuff?act=smr_recommended',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('KakaoTV', [ 'width' => 480, 'height' => 270]);
    }
}
