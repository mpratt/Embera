<?php
/**
 * TestServiceJest.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceJest extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.jest.com/embed/207307/music-video-resourcefully-assimilates-stock-footage',
            'http://www.jest.com/video/201909/',
            'http://www.jest.com/embed/202219',
            'http://jest.com/video/201618/cnns-undecided-voters-as-played-by-babies',
            'http://www.jest.com/video/201272/presidential-debate-2-remix',
            'http://www.jest.com/embed/209484/awkward-birthday',
            'http://jest.com/embed/209499/breaking/stuff',
        ),
        'invalid' => array(
            'http://www.jest.com/embedVideo/6897394', // wrong path
            'http://www.jest.com/embed/6buaksui4', // Not numeric
            'http://www.jest.com/videos/6897394',
            'http://www.jest.com/6897394'
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<embed'
        )
    );

    public function testProvider() { $this->validateProvider('Jest'); }
}
?>
