<?php
/**
 * TestServiceRoomshare.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRoomshare extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://roomshare.jp/en/post/137453',
            'http://roomshare.jp/post/137453',
            'http://roomshare.jp/en/post/137393/',
            'http://www.roomshare.jp/post/137393',
        ),
        'invalid' => array(
            'http://roomshare.jp/en/post?region=1',
            'http://roomshare.jp/en/',
            'http://roomshare.jp/keywords',
            'http://roomshare.jp',
        ),
    );

    public function testProvider() { $this->validateProvider('Roomshare'); }
}
?>
