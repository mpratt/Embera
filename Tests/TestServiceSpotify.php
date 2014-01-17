<?php
/**
 * TestServiceSpotify.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSpotify extends TestProviders
{
    protected $urls = array();

    public function testProvider()
    {
        $this->markTestIncomplete('There are no valid/invalid urls in the Spotify Test provider :(');
        $this->validateProvider('Spotify');
    }
}
?>
