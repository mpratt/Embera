<?php
/**
 * TestServiceMeetup.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceMeetup extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.meetup.com/PHPColMeetup/events/126690622/',
            'http://www.meetup.com/PHPColMeetup/photos/',
            'http://meetup.com/PHPColMeetup/events/calendar/?scroll=true',
            'http://www.meetup.com/PHPColMeetup/events/calendar/',
            'http://www.meetup.com/PHPColMeetup/',
        ),
        'invalid' => array(
            'http://www.meetup.com/',
            'http://meetu.ps/17GDWn/other/stuff',
        ),
        'normalize' => array(
            'http://www.meetup.com/PHPColMeetup/?scroll=true' => 'http://www.meetup.com/PHPColMeetup/',
            'http://www.meetup.com/PHPColMeetup/' => 'http://www.meetup.com/PHPColMeetup/',
        )
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('Meetup'); }
}
?>
