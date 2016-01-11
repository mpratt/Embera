<?php
/**
 * TestServiceFacebook.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceFacebook extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            /**
             * FIXME:
             * Could not find valid public urls with the following formats:
             *  - https://www.facebook.com/questions/{question-id}
             *  - https://www.facebook.com/{username}/activity/{activity-id}
             *  - https://www.facebook.com/video.php?id={video-id}
             *  - https://www.facebook.com/photos/{photo-id}
             *
             *  I found examples for this type of urls, but it seems that is not supported
             *  and since we know Facebook sucks at mantaining API's, is not a surprise
             *  - https://www.facebook.com/media/set?set={set-id}
             *    https://facebook.com/media/set/?set=a.396848117509.174735.184651592509
             *    https://www.facebook.com/media/set/?set=a.334300020471.345441.296274160471&type=3
             */
            'https://www.facebook.com/nopegida/posts/1117276211625055',
            'https://www.facebook.com/nopegida/posts/1117045234981486/',
            'https://www.facebook.com/notes/nopegida/netiquette/920088871343791',
            'https://facebook.com/coca-cola/photos/a.99394368305.88399.40796308305/10154703575238306/?type=3',
            'https://www.facebook.com/photo.php?fbid=10151025976302510&set=a.10150992587227510.445966.184651592509&type=1&relevant_count=1',
            'http://www.facebook.com/permalink.php?story_fbid=660811664028467&id=282562525186718',
            'https://www.facebook.com/4jonnhart/videos/838982552851199/',
            'https://www.facebook.com/video.php?v=10153482090911661',
        ),
        'invalid' => array(
            'https://www.facebook.com/',
            'https://facebook.com/docs/plugins/oembed-endpoints',
            'https://www.facebook.com/about/privacy',
            'https://www.facebook.com/login.php',
            'https://www.facebook.com/lite/',
            'https://www.facebook.com/nopegida/',
            'https://www.facebook.com/photo.php?bad_order=1&fbid=10151025976302510&set=a.10150992587227510.445966.184651592509',
        ),
    );

    public function testProvider() { $this->validateProvider('Facebook'); }
}
?>
