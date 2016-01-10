<?php
/**
 * TestServiceVerse.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVerse extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://verse.media/stories/112-connected-to-the-top/arrival-at-base-camp',
            'https://www.verse.media/stories/112-connected-to-the-top/',
            'http://verse.media/stories/112-connected-to-the-top/up-the-icefall/',
            'http://verse.media/stories/112-connected-to-the-top/reaching-for-the-top/interview-with-sam-elias',
        ),
        'invalid' => array(
            'http://verse.media',
            'http://verse.media/not/stories/112-connected-to-the-top/reaching-for-the-top/interview-with-sam-elias',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Verse'); }
}
?>
