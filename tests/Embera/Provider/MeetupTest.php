<?php
/**
 * MeetupTest.php
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
 * Test the Meetup Provider
 */
final class MeetupTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.meetup.com/PHPColMeetup/events/126690622/',
            'http://www.meetup.com/PHPColMeetup/photos/',
            'http://meetup.com/PHPColMeetup/events/calendar/?scroll=true',
            'http://www.meetup.com/PHPColMeetup/events/calendar/',
            'http://www.meetup.com/PHPColMeetup/',
        ],
        'invalid_urls' => [
            'http://www.meetup.com/',
            'http://meetu.ps/17GDWn/other/stuff',
        ],
        'normalize_urls' => [
            'http://www.meetup.com/PHPColMeetup/?scroll=true' => 'https://www.meetup.com/PHPColMeetup/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Meetup', [ 'width' => 480, 'height' => 270]);
    }
}
