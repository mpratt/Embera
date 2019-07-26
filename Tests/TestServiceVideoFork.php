<?php
/**
 * TestServiceVideoFork.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVideoFork extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://videofork.com/play/1655979',
            'http://videofork.com/play/1655970/',
            'http://videofork.com/play/1656128/other/stuff',
            'http://videofork.com/oembed/1656122',
            'http://videofork.com/oembed/1656113/',
            'http://videofork.com/play/1656101',
        ),
        'invalid' => array(
            'http://videofork.com/?q=',
            'http://videofork.com/',
            'http://videofork.com/technology',
            'http://videofork.com/forks/new',
            '',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<object'
        )
    );

    public function testProvider() { $this->validateProvider('VideoFork'); }
}
