<?php
/**
 * TestServiceRumble.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRumble extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://rumble.com/v35h0w-5294192.html',
            'https://www.rumble.com/v3639s-kangaroo-boys-sparring.html',
            'http://rumble.com/v362zs-horse-championship-in-columbia.html',
            'https://rumble.com/v362lc-cat-roughhousing.html?query-string',
            'http://rumble.com/v35zu6-pug-getting-a-scrub-in-a-tub.html',
        ),
        'invalid' => array(
            'https://rumble.com',
            'https://rumble.com/all/?&sortby=most-recent&filter=all-time',
            'https://rumble.com/upload.php',
            'https://rumble.com/editor-picks/',
        ),
    );

    public function testProvider() { $this->validateProvider('Rumble'); }
}
?>
