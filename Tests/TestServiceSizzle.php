<?php
/**
 * TestServiceSizzle.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSizzle extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://onsizzle.com/i/from-time-to-time-ae-whats-the-nastiest-thing-youve-12360154',
            'http://www.onsizzle.com/i/but-u-still-arent-10-pounds-lighter-thebrain-tickle-tho-12354833',
        ),
        'invalid' => array(
            'https://onsizzle.com/',
            'https://onsizzle.com/t/music',
        ),
    );

    public function testProvider() { $this->validateProvider('Sizzle'); }
}
?>
