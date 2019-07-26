<?php
/**
 * TestServiceReleaseWire.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceReleaseWire extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.releasewire.com/press-releases/release-600961.htm',
            'http://releasewire.com/press-releases/release-600742.htm',
            'http://www.releasewire.com/press-releases/release-600657.htm?query=string',
            'http://www.rwire.com/600657',
            'http://rwire.com/600681/?query=string',
            'http://rwire.com/600775?query=string',
        ),
        'invalid' => array(
            'http://www.releasewire.com/media-engagement-process/create/',
            'http://www.releasewire.com/about/',
            'http://media.releasewire.com/photos/show/?id=85997',
            'http://www.releasewire.com/company/jonathan-w-mcconnell-89768.htm',
            'http://www.rwire.com/notnumeric',
        ),
        'normalize' => array(
            'http://www.releasewire.com/press-releases/release-600961.htm' => 'http://rwire.com/600961',
            'http://www.releasewire.com/press-releases/release-600657.htm?query=string' => 'http://rwire.com/600657',
        ),
    );

    public function testProvider() { $this->validateProvider('ReleaseWire'); }
}
