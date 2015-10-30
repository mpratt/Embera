<?php
/**
 * TestServiceVimeo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVimeo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://vimeo.com/channels/staffpicks/66252440',
            'http://vimeo.com/channels/staffpicks/65535198/',
            'http://vimeo.com/groups/shortfilms/videos/66185763',
            'https://vimeo.com/groups/shortfilms/videos/63313811/',
            'http://vimeo.com/47360546',
            'http://vimeo.com/39892335/',
            'https://player.vimeo.com/video/65297606',
            'https://player.vimeo.com/video/25818086/'
        ),
        'invalid' => array(
            'http://vimeo.com/groups/shortfilms/videos/66185763/stuff/here',
            'http://vimeo.com/47360546/other/stuff/',
            'http://vimeo.com/groups/shortfilms/123',
            'http://vimeo.com/groups/shortfilms',
            'http://vimeo.com/',
            'http://vimeo.com/groups/stuff/?autoplay=1'
        ),
        'normalize' => array(
            'http://vimeo.com/channels/staffpicks/66252440' => 'http://vimeo.com/66252440',
            'http://vimeo.com/channels/staffpicks/65535198/' => 'http://vimeo.com/65535198',
            'https://player.vimeo.com/video/65297606' => 'http://vimeo.com/65297606',
            'http://vimeo.com/groups/shortfilms/videos/63313811/' => 'http://vimeo.com/63313811',
            'http://vimeo.com/47360546' => 'http://vimeo.com/47360546',
            'http://vimeo.com/39892335/' => 'http://vimeo.com/39892335',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Vimeo'); }
}
?>
